// Install service worker
self.addEventListener('install', event => {
  event.waitUntil(
    caches.open('app-cache').then(cache => {
      return cache.addAll([
        '/',
        '/index.html',
        '/styles/main.css',
        '/scripts/main.js',
        '/images/logo.png'
        // ... daftar aset yang akan di-cache
      ]);
    })
  );
});

// Intercept network requests
self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request).then(response => {
      return response || fetch(event.request);
    })
  );
});

// Handle push notifications
self.addEventListener('push', event => {
  const options = {
    body: event.data.text(),
    icon: '/images/icon.png'
  };

  event.waitUntil(
    self.registration.showNotification('PWA Notification', options)
  );
});
