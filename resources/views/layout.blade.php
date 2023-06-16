<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title") - Laravel</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="h-screen bg-gray-50 dark:bg-gray-900">
@yield('content')
<div id="toast-container" class="fixed bottom-4 right-4 flex flex-col items-end z-50"></div>
</body>
<script>
    function showToast(message, type) {
        const toastContainer = document.getElementById('toast-container');
        const toastElement = document.createElement('div');
        toastElement.classList.add(
            'bg-gray-800',
            'text-white',
            'py-2',
            'px-4',
            'rounded-md',
            'mb-4',
            'shadow-md',
            'opacity-0',
            'transition-opacity',
            'duration-300',
            'ease-in-out'
        );

        if (type === 'success') {
            toastElement.classList.add('bg-green-500');
        } else if (type === 'error') {
            toastElement.classList.add('bg-red-500');
        }

        toastElement.textContent = message;
        toastContainer.appendChild(toastElement);

        setTimeout(() => {
            toastElement.classList.remove('opacity-0');
        }, 100);

        setTimeout(() => {
            toastElement.classList.add('opacity-0');
        }, 3000);

        setTimeout(() => {
            toastElement.remove();
        }, 3300);
    }

</script>
</html>
