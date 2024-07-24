<?php

declare(strict_types=1);
use src\User;
$bot = new Bot();
if (isset($update->message)) {
    $message = $update->message;
    $chatId  = $message->chat->id;
    $text    = $message->text;

    if ($text === "/start") {
        $user = new User();
        $user-> save_user($chatId);
        $bot->handleStartCommand($chatId);
        return;
    }

    if ($text === "/add") {
        $bot->handleAddCommand($chatId);
        return;
    }

    if ($text === "/all") {
        $bot->getAllTasks($chatId);
        return;
    }

    $bot->addTask($chatId, $text);
}

if (isset($update->callback_query)) {
    $callbackQuery = $update->callback_query;
    $callbackData  = (int) $callbackQuery->data;
    $chatId        = $callbackQuery->message->chat->id;
    $messageId     = $callbackQuery->message->message_id;
//    if ($callbackData == 'delete'){
//
//    }
//    $user = new User();
//    if ($user->getUserInfo()->status == 'delete'){
//
//    }
    $bot->handleInlineButton($chatId, $callbackData);
}

