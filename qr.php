<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Form</title>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const today = new Date().toISOString().split('T')[0];
            const ciInput = document.getElementById('ci');
            const coInput = document.getElementById('co');

            ciInput.setAttribute('min', today);
            ciInput.value = today;
            coInput.value = new Date(Date.now() + 86400000).toISOString().split('T')[0];

            ciInput.addEventListener('change', () => {
                const checkInDate = new Date(ciInput.value);
                const checkOutDate = new Date(checkInDate.getTime() + 86400000);
                coInput.value = checkOutDate.toISOString().split('T')[0];
                coInput.setAttribute('min', coInput.value);
            });
        });

        function generateAndOpenLink() {
            const ci = document.getElementById('ci').value;
            const co = document.getElementById('co').value;
            
            if (ci && co) {
                const baseUrl = 'https://app.inn-connect.com/book2/?p=Hillocks+Hotel+%26+Spa#list';
                const queryParams = `%7B%22ci%22:%22${ci}%22,%22co%22:%22${co}%22,%22rooms%22:%5B%7B%22adults%22:2%7D%5D%7D`;
                const fullUrl = `${baseUrl}${queryParams}`;
                
                window.open(fullUrl, '_blank');
            } else {
                alert('Please enter both check-in and check-out dates.');
            }
        }
    </script>
</head>
<body style="font-family: Arial, sans-serif; background-color: transparent; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
    <div class="booking-container" style="padding: 20px; border-radius: 8px; display: flex; align-items: center; gap: 10px;">
        <div class="form-group" style="display: flex; align-items: center; margin-right: 10px;">
            <label for="ci" style="margin-right: 5px; color: black;">Check-in:</label>
            <input type="date" id="ci" name="ci" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 150px;">
        </div>
        <div class="form-group" style="display: flex; align-items: center; margin-right: 10px;">
            <label for="co" style="margin-right: 5px; color: black;">Check-out:</label>
            <input type="date" id="co" name="co" required style="padding: 10px; border: 1px solid #ccc; border-radius: 4px; width: 150px;">
        </div>
        <button type="button" class="booking-button" onclick="generateAndOpenLink()" style="padding: 10px 20px; background-color: #07261C; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; transition: background-color 0.3s;">
            Book Now
        </button>
    </div>
</body>
</html>
