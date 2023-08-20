<!DOCTYPE html>

<style>
    .chat-messages {
        width: 100%;
        height: 50vh; /* Adjust the desired height */
        overflow-y: auto; /* Add a vertical scroll bar when content exceeds height */
        border: 1px solid #ccc; /* Optional: Add a border for styling */
    }

    .chat-message {
        padding: 10px;
        border-bottom: 1px solid #eee; /* Optional: Add a separator between messages */
    }
</style>

<html>
<head>
    <title>Chat Application</title>
</head>
<body>
    <div class="chat-container">
        <div class="chat-messages">
            <!-- Display chat messages here -->
            <?php $__currentLoopData = $formattedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formattedMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div>
                    <p><?php echo e($formattedMessage['message']); ?></p>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <form action="<?php echo e(route('api.chat.send')); ?>" method="POST">
            <?php echo csrf_field(); ?> <!-- Include the CSRF token -->
            <input type="hidden" name="sender_user_id" value="1">
            <input type="hidden" name="receiver_user_id" value="2">
            <input type="hidden" name="place_id" value="2">
            <input type="text" name="message" placeholder="Type your message...">
            <button type="submit">Send</button>
        </form>

    </div>
</body>
</html>

<script>
    
    function fetchMessages() {
    fetch(`/chat/${sender_user_id}/${place_id}`)
        .then(response => response.json())
        .then(data => {
            const messages = data.formattedMessages;
            const chatMessagesElement = document.querySelector('.chat-messages');
            // Clear existing messages
            chatMessagesElement.innerHTML = '';
            // Loop through messages and append them to the chat container
            messages.forEach(formattedMessage => {
                // Create a new message element and append it to the chat container
                const messageElement = document.createElement('div');
                messageElement.classList.add('message');
                messageElement.textContent = formattedMessage.message;
                // Append the message element to the chat container
                chatMessagesElement.appendChild(messageElement);
            });
        });
    }

    
</script>
<?php /**PATH /Users/phyuphyucho/Petmo-serverside/resources/views/chat.blade.php ENDPATH**/ ?>