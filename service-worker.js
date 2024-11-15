self.addEventListener('push', function(event) {
    const data = event.data.json();
  
    // Show a notification
    self.registration.showNotification(data.title, {
      body: data.body,
      icon: '/path-to-icon.png',
    });
  });
  