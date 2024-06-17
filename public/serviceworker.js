self.addEventListener('install', function(event) {
  event.waitUntil(
      caches.open('my-cache').then(function(cache) {
          return cache.addAll([
              '/',
              '/offline',
              '/css/app.css',
              '/build/assets/app-7d02d1c2.js',
              '/images/icons/icon-72x72.png'
          ]);
      })
  );
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
      caches.match(event.request).then(function(response) {
          return response || fetch(event.request);
      })
  );
});
