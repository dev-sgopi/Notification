// This function is called to register the service worker and subscribe the user to push notifications
async function subscribeToPush() {
    // Register the service worker
    const registration = await navigator.serviceWorker.register('/service-worker.js');
  
    // Subscribe to push notifications
    const subscription = await registration.pushManager.subscribe({
      userVisibleOnly: true, // The notification must be visible to the user
      applicationServerKey: 'BPcc8yjIRFN6p-A_YnnQRtB2VbDUPEo4kgd1qSy_UrVpuh0f3vZoEMY9iksyPuBDBfAsg1GQusKT5nb6X44oaFI', // Replace with your VAPID public key
    });
  
    // Send subscription details to your server (save it to your database)
    fetch('/save-subscription.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(subscription)
    })
    .then(response => response.json())
    .then(data => {
      console.log('Subscription saved: ', data);
    })
    .catch(error => {
      console.error('Error saving subscription: ', error);
    });
  }
  
  // Call this function when the page loads or based on user interaction
  subscribeToPush();
  