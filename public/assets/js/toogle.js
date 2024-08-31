
function toggleRoomStatus(roomId) {
    alert(roomId);
    fetch(`/rooms/${roomId}/toggle`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json',
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload(); // Reload the page to see the updated status
        } else {
            alert('Failed to toggle room status');
        }
    })
    .catch(error => console.error('Error:', error));
}
