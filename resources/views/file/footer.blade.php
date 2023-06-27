@livewireScripts
<script>
    var userId = {{ Auth::id() }}
   
        window.addEventListener('DOMContentLoaded', function() {
        Echo.private('Users.' + userId)
                    .notification((notification) => {
                        Livewire.emit('refreshComponent');
                        Livewire.emit('refreshNotificationList');
                        Livewire.emit('refreshAnonymousMessage');

        });

                   
        });
    </script>
</body>
</html>