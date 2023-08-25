<!DOCTYPE html>
<html>
<head>
    <title>Chat Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .chat-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .chat-messages {
            width: 100%;
            height: 50vh;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
        }

        .chat-message {
            padding: 10px;
            border-bottom: 1px solid #eee;
            margin-bottom: 10px;
        }

        .chat-form {
            display: flex;
            align-items: center;
            margin-top: 10px;
        }

        .message-input {
            flex-grow: 1;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .send-button {
            margin-left: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
            background-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .send-button:hover {
            background-color: #0056b3;
        }

        .back-link {
            margin-top: 10px;
            display: inline-block;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
        
        .chat-message {
            display: flex;
            justify-content: flex-start;
            align-items: flex-start;
            margin-bottom: 10px;
        }

        .chat-message p {
            background-color: #f0f0f0;
            border-radius: 10px;
            padding: 10px;
            max-width: 70%;
            word-wrap: break-word;
        }

        .chat-message.me p {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="chat-container">
        <div class="chat-messages">
            <!-- Display chat messages here -->
            <?php $__currentLoopData = $formattedMessages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $formattedMessage): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="chat-message">
                    <?php if($formattedMessage['sender_user_id'] == auth()->user()->id): ?>
                        <div style="">
                            <p><?php echo e($formattedMessage['message']); ?></p>
                        </div>
                    <?php else: ?>
                        <div style="margin-left: 700px;">
                            <p><?php echo e($formattedMessage['message']); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <form action="<?php echo e(route('api.chat.send', ['sender_user_id' => request()->route('sender_user_id'), 'receiver_user_id' => request()->route('receiver_user_id'), 'place_id' => request()->route('place_id')])); ?>" method="POST" class="chat-form">
            <?php echo csrf_field(); ?> <!-- Include the CSRF token -->
            <input type="hidden" name="sender_user_id" value="<?php echo e(request()->route('sender_user_id')); ?>">
            <input type="hidden" name="receiver_user_id" value="<?php echo e(request()->route('receiver_user_id')); ?>">
            <input type="hidden" name="place_id" value="<?php echo e(request()->route('place_id')); ?>">
            <input type="text" name="message" placeholder="Type your message..." class="message-input">
            <button type="submit" class="send-button">Send</button>
        </form>
        <a href="<?php echo e(route('getPetAzukePlace', ['place_id' => request()->route('place_id')])); ?>" class="back-link">Back</a>
    </div>
</body>
</html>
<?php /**PATH /Users/phyuphyucho/Petmo-serverside/resources/views/chat.blade.php ENDPATH**/ ?>