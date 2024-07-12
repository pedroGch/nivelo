const CACHE_NAME = 'nivelo-cache';
const urlsToCache = [
  '/',
  './css/app.css',
  './css/bootstrap/css/bootstrap.min.css',
  './build/assets/app-7d02d1c2.js',
  './img/icons/notable-place.png'
];

self.addEventListener('install', event => {
  console.log('Service Worker: instalación en progreso.');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('abriendo cache');
        return Promise.all(
          urlsToCache.map(url => {
            return fetch(url, { mode: 'no-cors' }).then(response => {
              if (!response.ok) {
                throw new Error(`fallo el fetch ${url}: ${response.statusText}`);
              }
              return cache.put(url, response);
            }).catch(error => {
              console.error(`fallo el cache ${url}:`, error);
            });
          })
        );
      })
      .then(() => {
        console.log('All resources have been fetched and cached.');
      })
      .catch(error => {
        console.error('Failed to open cache or cache some resources', error);
      })
  );
});

self.addEventListener('fetch', event => {

  if (event.request.method === 'POST') {
    // No manejar solicitudes POST
    return;
  }

  event.respondWith(
    caches.match(event.request)
      .then(response => {
        if (response) {
          console.log('Returning cached response for', event.request.url);
          return response;
        }
        console.log('Fetching request from network', event.request.url);
        return fetch(event.request);
      })
      .catch(error => {
        console.error('Failed to fetch', error);
      })
  );
});

self.addEventListener('activate', event => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then(cacheNames => {
      return Promise.all(
        cacheNames.map(cacheName => {
          if (cacheWhitelist.indexOf(cacheName) === -1) {
            console.log('Deleting old cache', cacheName);
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});

// Importar las bibliotecas de Firebase
importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-app-compat.js');
importScripts('https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging-compat.js');

// Configuración de Firebase
firebase.initializeApp({
  apiKey: "AIzaSyDN4tZLcnoU2Y8GrcNtuBwohRtWoBPna5Q",
  authDomain: "niveloapp.firebaseapp.com",
  projectId: "niveloapp",
  storageBucket: "niveloapp.appspot.com",
  messagingSenderId: "420723030687",
  appId: "1:420723030687:web:30025239c292674b8880aa",
  measurementId: "G-49LMQBNTPS"
});

const messaging = firebase.messaging();

messaging.onBackgroundMessage(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  const notificationTitle = payload.notification.title;
  const notificationOptions = {
    body: payload.notification.body,
    icon: payload.notification.icon
  };

  self.registration.showNotification(notificationTitle, notificationOptions);
});
