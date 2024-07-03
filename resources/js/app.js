// Importar Bootstrap
import './bootstrap';

// Importar las funciones necesarias de los SDKs de Firebase
import { initializeApp } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-app.js';
import { getMessaging, getToken, onMessage } from 'https://www.gstatic.com/firebasejs/9.6.10/firebase-messaging.js';

// Configuración de Firebase para tu aplicación web
const firebaseConfig = {
  apiKey: "AIzaSyDN4tZLcnoU2Y8GrcNtuBwohRtWoBPna5Q",
  authDomain: "niveloapp.firebaseapp.com",
  projectId: "niveloapp",
  storageBucket: "niveloapp.appspot.com",
  messagingSenderId: "420723030687",
  appId: "1:420723030687:web:30025239c292674b8880aa",
  measurementId: "G-49LMQBNTPS"
};

// Inicializar Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);

if ('serviceWorker' in navigator) {
  navigator.serviceWorker.register('/firebase-messaging-sw.js')
    .then((registration) => {
      console.log('Service Worker registered successfully:', registration);
      messaging.useServiceWorker(registration);

      // Usar la VAPID key proporcionada
      getToken(messaging, { vapidKey: 'BFzmfnXB4k9tGIdjnjvefMTJu9m-abRcAkOsBOCmMzZzFcqZcY28OvB6bjXOnWL4HSz6RKRaeVC5FAKiS5_pdfY' }).then((currentToken) => {
        if (currentToken) {
          console.log('Token received: ', currentToken);
          storeToken(currentToken);
        } else {
          console.log('No registration token available. Request permission to generate one.');
        }
      }).catch((err) => {
        console.error('An error occurred while retrieving token. ', err);
      });

      onMessage(messaging, (payload) => {
        console.log('Message received. ', payload);
        // Personalizar la visualización de la notificación
      });
    }).catch((err) => {
      console.error('Service Worker registration failed: ', err);
    });
}

function storeToken(token) {
  console.log('Storing token on the server: ', token);  // Agregando mensaje de depuración
  fetch('/fcm-token', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
    body: JSON.stringify({ fcm_token: token })
  }).then(response => response.json())
    .then(data => {
      console.log('Token stored successfully:', data);
    }).catch(error => {
      console.error('Error storing token:', error);
    });
}
