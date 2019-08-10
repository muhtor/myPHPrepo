<?php
require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor\autoload.php';

use Telebot\Core\Bot;
use Telebot\Core\Context;
use Telebot\Addons\Keyboard;

$bot = new Bot(include "setting.php");


//$bot = new Bot($settings);
$bot->cmd('start', function (Context $ctx) {
    $menu = new Keyboard();
    $menu->row('Aloqa','Manzil','Ruyxat');
    $menu->row('Foto','Geo');
    $menu->row('Audio');
    $menu->property('resize_keyboard', true);
    $ctx->reply('navigation', $menu, true);

});
$bot->cmd('geo', function (Context $ctx){

});

/*/
$bot->cmd('menu', function (Context $ctx) {
    $menu = new Keyboard();
    $menu->row('1🍏','2🍏','3🍏');
    $menu->row('4🍏','5🍏');
    $menu->row('6🍏');
    $menu->property('resize_keyboard', true);
    $ctx->reply('navigation', $menu, true);
});



$bot->act('Dena', function (Context $ctx){
    $menu = new Keyboard(Keyboard::INLINE);
    $menu->row(Keyboard::btn('Olmali', '55'));
    $menu->row(Keyboard::btn('Apelsinli', '66'));
    $ctx->editActTxt('Siz Sharbatni tanladingiz', $menu);
});
$bot->act('Seylon', function (Context $ctx){
    $menu = new Keyboard(Keyboard::INLINE);
    $menu->row(Keyboard::btn('Kuk choy', '55'));
    $menu->row(Keyboard::btn('Qora choy', '66'));
    $ctx->editActTxt('Siz Choyni tanladingiz', $menu);
});

$bot->txt("{count:int}🍏", function (Context $ctx) {
    if ($ctx->params['count']==6){
        $menu = new Keyboard(Keyboard::INLINE);
        $menu->row(Keyboard::btn('Sharbat', 'Dena'));
        $menu->row(Keyboard::btn('Tea', 'Seylon'));
        $ctx->reply('SHARBAT VA CHOY', $menu);
    }
    else{
        $ctx->reply('Sizni olmangiz: ' . $ctx->params['count'] . ' dona');
    }
});
*/

$bot->txt('{text:any}\?', function (Context $ctx) {
    $ctx->replyMarkdown('Berilgan savol: ' . $ctx->params['text'], null, true);
});

$bot->hears('salom', function (Context $ctx) {
    $ctx->reply('bir marta salom berganingizdan keyin qayta salom berish shart emas!');
});
$bot->run();
