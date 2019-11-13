# Элемент для оплаты через Яндекс.Кассу (Email) 

Простейший элемент оплаты для перенаправления пользователя на сайт Яндекс.Кассы.
Продавец получит извещение об оплате от Яндекса на почту, которая была указана при заключении договора.


У данного элемента нет полной интеграции с API, т.к он использует способ работы через Email.
Т.е сайт не узнает об оплате и не изменит статуса, не отправит почты. В настройках есть два обязательных поля - их вы получите при заключении договора с Яндексом.

Элемент работает только с JBZoo v2.2.x


## Установка
Распаковать архив в папку с элементами оплаты `/media/zoo/applications/jbuniversal/cart-elements/payment/yandexkassaemail`
так, чтобы в указанной папке был файл `yandexkassaemail.php`


## Баги? Вопросы?
По всем вопросам обращайтесь в нашу техническую поддержку на форум [Forum.JBZoo.com](http://forum.jbzoo.com/) или почту admin@jbzoo.com


## Лицензия
MIT