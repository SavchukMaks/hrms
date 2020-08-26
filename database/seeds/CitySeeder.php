<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('cities')->truncate();

        DB::table('cities')->insert(
            [
                ['title'=>"Алупка",'country_id'=>"1"],
                ['title'=>"Алушта",'country_id'=>"1"],
                ['title'=>"Армянск",'country_id'=>"1"],
                ['title'=>"Бахчисарай",'country_id'=>"1"],
                ['title'=>"Белогорск",'country_id'=>"1"],
                ['title'=>"Джанкой",'country_id'=>"1"],
                ['title'=>"Евпатория",'country_id'=>"1"],
                ['title'=>"Керчь",'country_id'=>"1"],
                ['title'=>"Красноперекопск",'country_id'=>"1"],
                ['title'=>"Саки",'country_id'=>"1"],
                ['title'=>"Севастополь",'country_id'=>"1"],
                ['title'=>"Симферополь",'country_id'=>"1"],
                ['title'=>"Старый Крым",'country_id'=>"1"],
                ['title'=>"Судак",'country_id'=>"1"],
                ['title'=>"Феодосия",'country_id'=>"1"],
                ['title'=>"Щёлкино",'country_id'=>"1"],
                ['title'=>"Ялта",'country_id'=>"1"],
                ['title'=>"Бар",'country_id'=>"1"],
                ['title'=>"Бершадь",'country_id'=>"1"],
                ['title'=>"Винница",'country_id'=>"1"],
                ['title'=>"Гайсин",'country_id'=>"1"],
                ['title'=>"Жмеринка",'country_id'=>"1"],
                ['title'=>"Казатин",'country_id'=>"1"],
                ['title'=>"Калиновка",'country_id'=>"1"],
                ['title'=>"Ладыжин",'country_id'=>"1"],
                ['title'=>"Могилёв-Подольский",'country_id'=>"1"],
                ['title'=>"Немиров",'country_id'=>"1"],
                ['title'=>"Погребище",'country_id'=>"1"],
                ['title'=>"Тульчин",'country_id'=>"1"],
                ['title'=>"Хмельник",'country_id'=>"1"],
                ['title'=>"Шаргород",'country_id'=>"1"],
                ['title'=>"Ямполь",'country_id'=>"1"],
                ['title'=>"Берестечко",'country_id'=>"1"],
                ['title'=>"Владимир-Волынский",'country_id'=>"1"],
                ['title'=>"Горохов",'country_id'=>"1"],
                ['title'=>"Камень-Каширский",'country_id'=>"1"],
                ['title'=>"Киверцы",'country_id'=>"1"],
                ['title'=>"Ковель",'country_id'=>"1"],
                ['title'=>"Луцк",'country_id'=>"1"],
                ['title'=>"Любомль",'country_id'=>"1"],
                ['title'=>"Нововолынск",'country_id'=>"1"],
                ['title'=>"Рожище",'country_id'=>"1"],
                ['title'=>"Устилуг",'country_id'=>"1"],
                ['title'=>"Апостолово",'country_id'=>"1"],
                ['title'=>"Верхнеднепровск",'country_id'=>"1"],
                ['title'=>"Вольногорск",'country_id'=>"1"],
                ['title'=>"Днепродзержинск",'country_id'=>"1"],
                ['title'=>"Днепропетровск",'country_id'=>"1"],
                ['title'=>"Жёлтые Воды",'country_id'=>"1"],
                ['title'=>"Кривой Рог",'country_id'=>"1"],
                ['title'=>"Марганец",'country_id'=>"1"],
                ['title'=>"Никополь",'country_id'=>"1"],
                ['title'=>"Новомосковск",'country_id'=>"1"],
                ['title'=>"Орджоникидзе",'country_id'=>"1"],
                ['title'=>"Павлоград",'country_id'=>"1"],
                ['title'=>"Перещепино",'country_id'=>"1"],
                ['title'=>"Першотравенск",'country_id'=>"1"],
                ['title'=>"Подгородное",'country_id'=>"1"],
                ['title'=>"Пятихатки",'country_id'=>"1"],
                ['title'=>"Синельниково",'country_id'=>"1"],
                ['title'=>"Терновка",'country_id'=>"1"],
                ['title'=>"Авдеевка",'country_id'=>"1"],
                ['title'=>"Артёмовск",'country_id'=>"1"],
                ['title'=>"Волноваха",'country_id'=>"1"],
                ['title'=>"Горловка",'country_id'=>"1"],
                ['title'=>"Дзержинск",'country_id'=>"1"],
                ['title'=>"Дебальцево",'country_id'=>"1"],
                ['title'=>"Димитров",'country_id'=>"1"],
                ['title'=>"Доброполье",'country_id'=>"1"],
                ['title'=>"Докучаевск",'country_id'=>"1"],
                ['title'=>"Донецк",'country_id'=>"1"],
                ['title'=>"Дружковка",'country_id'=>"1"],
                ['title'=>"Енакиево",'country_id'=>"1"],
                ['title'=>"Ждановка",'country_id'=>"1"],
                ['title'=>"Зугрэс",'country_id'=>"1"],
                ['title'=>"Кировское",'country_id'=>"1"],
                ['title'=>"Краматорск",'country_id'=>"1"],
                ['title'=>"Красноармейск",'country_id'=>"1"],
                ['title'=>"Красный Лиман",'country_id'=>"1"],
                ['title'=>"Константиновка",'country_id'=>"1"],
                ['title'=>"Мариуполь",'country_id'=>"1"],
                ['title'=>"Макеевка",'country_id'=>"1"],
                ['title'=>"Новогродовка",'country_id'=>"1"],
                ['title'=>"Селидово",'country_id'=>"1"],
                ['title'=>"Славянск",'country_id'=>"1"],
                ['title'=>"Снежное",'country_id'=>"1"],
                ['title'=>"Соледар",'country_id'=>"1"],
                ['title'=>"Торез",'country_id'=>"1"],
                ['title'=>"Угледар",'country_id'=>"1"],
                ['title'=>"Харцызск",'country_id'=>"1"],
                ['title'=>"Шахтёрск",'country_id'=>"1"],
                ['title'=>"Ясиноватая",'country_id'=>"1"],
                ['title'=>"Андрушёвка",'country_id'=>"1"],
                ['title'=>"Барановка",'country_id'=>"1"],
                ['title'=>"Бердичев",'country_id'=>"1"],
                ['title'=>"Житомир",'country_id'=>"1"],
                ['title'=>"Коростень",'country_id'=>"1"],
                ['title'=>"Коростышев",'country_id'=>"1"],
                ['title'=>"Малин",'country_id'=>"1"],
                ['title'=>"Новоград-Волынский",'country_id'=>"1"],
                ['title'=>"Овруч",'country_id'=>"1"],
                ['title'=>"Радомышль",'country_id'=>"1"],
                ['title'=>"Берегово",'country_id'=>"1"],
                ['title'=>"Виноградов",'country_id'=>"1"],
                ['title'=>"Иршава",'country_id'=>"1"],
                ['title'=>"Мукачево",'country_id'=>"1"],
                ['title'=>"Перечин",'country_id'=>"1"],
                ['title'=>"Рахов",'country_id'=>"1"],
                ['title'=>"Свалява",'country_id'=>"1"],
                ['title'=>"Тячев",'country_id'=>"1"],
                ['title'=>"Ужгород",'country_id'=>"1"],
                ['title'=>"Хуст",'country_id'=>"1"],
                ['title'=>"Чоп",'country_id'=>"1"],
                ['title'=>"Бердянск",'country_id'=>"1"],
                ['title'=>"Васильевка",'country_id'=>"1"],
                ['title'=>"Вольнянск",'country_id'=>"1"],
                ['title'=>"Гуляйполе",'country_id'=>"1"],
                ['title'=>"Днепрорудное",'country_id'=>"1"],
                ['title'=>"Запорожье",'country_id'=>"1"],
                ['title'=>"Каменка-Днепровская",'country_id'=>"1"],
                ['title'=>"Мелитополь",'country_id'=>"1"],
                ['title'=>"Молочанск",'country_id'=>"1"],
                ['title'=>"Орехов",'country_id'=>"1"],
                ['title'=>"Пологи",'country_id'=>"1"],
                ['title'=>"Приморск",'country_id'=>"1"],
                ['title'=>"Токмак",'country_id'=>"1"],
                ['title'=>"Энергодар",'country_id'=>"1"],
                ['title'=>"Болехов",'country_id'=>"1"],
                ['title'=>"Бурштын",'country_id'=>"1"],
                ['title'=>"Галич",'country_id'=>"1"],
                ['title'=>"Городенка",'country_id'=>"1"],
                ['title'=>"Долина",'country_id'=>"1"],
                ['title'=>"Ивано-Франковск",'country_id'=>"1"],
                ['title'=>"Калуш",'country_id'=>"1"],
                ['title'=>"Коломыя",'country_id'=>"1"],
                ['title'=>"Косов",'country_id'=>"1"],
                ['title'=>"Надворная",'country_id'=>"1"],
                ['title'=>"Рогатин",'country_id'=>"1"],
                ['title'=>"Снятын",'country_id'=>"1"],
                ['title'=>"Тысменица",'country_id'=>"1"],
                ['title'=>"Тлумач",'country_id'=>"1"],
                ['title'=>"Яремче",'country_id'=>"1"],
                ['title'=>"Белая Церковь",'country_id'=>"1"],
                ['title'=>"Березань",'country_id'=>"1"],
                ['title'=>"Богуслав",'country_id'=>"1"],
                ['title'=>"Борисполь",'country_id'=>"1"],
                ['title'=>"Боярка",'country_id'=>"1"],
                ['title'=>"Бровары",'country_id'=>"1"],
                ['title'=>"Буча",'country_id'=>"1"],
                ['title'=>"Васильков",'country_id'=>"1"],
                ['title'=>"Вишнёвое",'country_id'=>"1"],
                ['title'=>"Вышгород",'country_id'=>"1"],
                ['title'=>"Ирпень",'country_id'=>"1"],
                ['title'=>"Кагарлык",'country_id'=>"1"],
                ['title'=>"Киев",'country_id'=>"1"],
                ['title'=>"Мироновка",'country_id'=>"1"],
                ['title'=>"Обухов",'country_id'=>"1"],
                ['title'=>"Переяслав-Хмельницкий",'country_id'=>"1"],
                ['title'=>"Припять",'country_id'=>"1"],
                ['title'=>"Ржищев",'country_id'=>"1"],
                ['title'=>"Сквира",'country_id'=>"1"],
                ['title'=>"Славутич",'country_id'=>"1"],
                ['title'=>"Тараща",'country_id'=>"1"],
                ['title'=>"Тетиев",'country_id'=>"1"],
                ['title'=>"Узин",'country_id'=>"1"],
                ['title'=>"Украинка",'country_id'=>"1"],
                ['title'=>"Фастов",'country_id'=>"1"],
                ['title'=>"Чернобыль",'country_id'=>"1"],
                ['title'=>"Яготин",'country_id'=>"1"],
                ['title'=>"Александрия",'country_id'=>"1"],
                ['title'=>"Бобринец",'country_id'=>"1"],
                ['title'=>"Гайворон",'country_id'=>"1"],
                ['title'=>"Долинская",'country_id'=>"1"],
                ['title'=>"Знаменка",'country_id'=>"1"],
                ['title'=>"Кировоград",'country_id'=>"1"],
                ['title'=>"Малая Виска",'country_id'=>"1"],
                ['title'=>"Новомиргород",'country_id'=>"1"],
                ['title'=>"Новоукраинка",'country_id'=>"1"],
                ['title'=>"Светловодск",'country_id'=>"1"],
                ['title'=>"Александровск",'country_id'=>"1"],
                ['title'=>"Алмазная",'country_id'=>"1"],
                ['title'=>"Алчевск",'country_id'=>"1"],
                ['title'=>"Антрацит",'country_id'=>"1"],
                ['title'=>"Брянка",'country_id'=>"1"],
                ['title'=>"Вахрушево",'country_id'=>"1"],
                ['title'=>"Горное",'country_id'=>"1"],
                ['title'=>"Зимогорье",'country_id'=>"1"],
                ['title'=>"Золотое",'country_id'=>"1"],
                ['title'=>"Зоринск",'country_id'=>"1"],
                ['title'=>"Краснодон",'country_id'=>"1"],
                ['title'=>"Красный Луч",'country_id'=>"1"],
                ['title'=>"Лисичанск",'country_id'=>"1"],
                ['title'=>"Луганск",'country_id'=>"1"],
                ['title'=>"Лутугино",'country_id'=>"1"],
                ['title'=>"Миусинск",'country_id'=>"1"],
                ['title'=>"Молодогвардейск",'country_id'=>"1"],
                ['title'=>"Новодружеск",'country_id'=>"1"],
                ['title'=>"Новопсков",'country_id'=>"1"],
                ['title'=>"Первомайск",'country_id'=>"1"],
                ['title'=>"Перевальск",'country_id'=>"1"],
                ['title'=>"Петровское",'country_id'=>"1"],
                ['title'=>"Попасная",'country_id'=>"1"],
                ['title'=>"Приволье",'country_id'=>"1"],
                ['title'=>"Ровеньки",'country_id'=>"1"],
                ['title'=>"Рубежное",'country_id'=>"1"],
                ['title'=>"Сватово",'country_id'=>"1"],
                ['title'=>"Свердловск",'country_id'=>"1"],
                ['title'=>"Северодонецк",'country_id'=>"1"],
                ['title'=>"Старобельск",'country_id'=>"1"],
                ['title'=>"Стаханов",'country_id'=>"1"],
                ['title'=>"Суходольск",'country_id'=>"1"],
                ['title'=>"Счастье",'country_id'=>"1"],
                ['title'=>"Теплогорск",'country_id'=>"1"],
                ['title'=>"Червонопартизанск",'country_id'=>"1"],
                ['title'=>"Белз",'country_id'=>"1"],
                ['title'=>"Бобрка",'country_id'=>"1"],
                ['title'=>"Борислав",'country_id'=>"1"],
                ['title'=>"Броды",'country_id'=>"1"],
                ['title'=>"Буск",'country_id'=>"1"],
                ['title'=>"Великие Мосты",'country_id'=>"1"],
                ['title'=>"Глиняны",'country_id'=>"1"],
                ['title'=>"Городок",'country_id'=>"1"],
                ['title'=>"Добромиль",'country_id'=>"1"],
                ['title'=>"Дрогобыч",'country_id'=>"1"],
                ['title'=>"Дубляны",'country_id'=>"1"],
                ['title'=>"Жидачов",'country_id'=>"1"],
                ['title'=>"Жолква",'country_id'=>"1"],
                ['title'=>"Золочев",'country_id'=>"1"],
                ['title'=>"Каменка-Бугская",'country_id'=>"1"],
                ['title'=>"Львов",'country_id'=>"1"],
                ['title'=>"Мостиска",'country_id'=>"1"],
                ['title'=>"Перемышляны",'country_id'=>"1"],
                ['title'=>"Пустомыты",'country_id'=>"1"],
                ['title'=>"Рава-Русская",'country_id'=>"1"],
                ['title'=>"Радехов",'country_id'=>"1"],
                ['title'=>"Рудки",'country_id'=>"1"],
                ['title'=>"Самбор",'country_id'=>"1"],
                ['title'=>"Сколе",'country_id'=>"1"],
                ['title'=>"Сокаль",'country_id'=>"1"],
                ['title'=>"Старый Самбор",'country_id'=>"1"],
                ['title'=>"Стрый",'country_id'=>"1"],
                ['title'=>"Трускавец",'country_id'=>"1"],
                ['title'=>"Угнев",'country_id'=>"1"],
                ['title'=>"Хыров",'country_id'=>"1"],
                ['title'=>"Червоноград",'country_id'=>"1"],
                ['title'=>"Яворов",'country_id'=>"1"],
                ['title'=>"Баштанка",'country_id'=>"1"],
                ['title'=>"Вознесенск",'country_id'=>"1"],
                ['title'=>"Николаев",'country_id'=>"1"],
                ['title'=>"Новая Одесса",'country_id'=>"1"],
                ['title'=>"Новый Буг",'country_id'=>"1"],
                ['title'=>"Очаков",'country_id'=>"1"],
                ['title'=>"Первомайск",'country_id'=>"1"],
                ['title'=>"Снигирёвка",'country_id'=>"1"],
                ['title'=>"Южноукраинск",'country_id'=>"1"],
                ['title'=>"Ананьев",'country_id'=>"1"],
                ['title'=>"Арциз",'country_id'=>"1"],
                ['title'=>"Балта",'country_id'=>"1"],
                ['title'=>"Белгород-Днестровский",'country_id'=>"1"],
                ['title'=>"Болград",'country_id'=>"1"],
                ['title'=>"Измаил",'country_id'=>"1"],
                ['title'=>"Ильичёвск",'country_id'=>"1"],
                ['title'=>"Килия",'country_id'=>"1"],
                ['title'=>"Кодыма",'country_id'=>"1"],
                ['title'=>"Котовск",'country_id'=>"1"],
                ['title'=>"Одесса",'country_id'=>"1"],
                ['title'=>"Татарбунары",'country_id'=>"1"],
                ['title'=>"Теплодар",'country_id'=>"1"],
                ['title'=>"Южное",'country_id'=>"1"],
                ['title'=>"Гадяч",'country_id'=>"1"],
                ['title'=>"Глобино",'country_id'=>"1"],
                ['title'=>"Гребёнка",'country_id'=>"1"],
                ['title'=>"Зеньков",'country_id'=>"1"],
                ['title'=>"Карловка",'country_id'=>"1"],
                ['title'=>"Кременчуг",'country_id'=>"1"],
                ['title'=>"Кобеляки",'country_id'=>"1"],
                ['title'=>"Комсомольск",'country_id'=>"1"],
                ['title'=>"Лохвица",'country_id'=>"1"],
                ['title'=>"Лубны",'country_id'=>"1"],
                ['title'=>"Миргород",'country_id'=>"1"],
                ['title'=>"Пирятин",'country_id'=>"1"],
                ['title'=>"Полтава",'country_id'=>"1"],
                ['title'=>"Хорол",'country_id'=>"1"],
                ['title'=>"Червонозаводское",'country_id'=>"1"],
                ['title'=>"Березне",'country_id'=>"1"],
                ['title'=>"Дубно",'country_id'=>"1"],
                ['title'=>"Дубровица",'country_id'=>"1"],
                ['title'=>"Здолбунов",'country_id'=>"1"],
                ['title'=>"Корец",'country_id'=>"1"],
                ['title'=>"Костополь",'country_id'=>"1"],
                ['title'=>"Кузнецовск",'country_id'=>"1"],
                ['title'=>"Острог",'country_id'=>"1"],
                ['title'=>"Радивилов",'country_id'=>"1"],
                ['title'=>"Ровно",'country_id'=>"1"],
                ['title'=>"Сарны",'country_id'=>"1"],
                ['title'=>"Ахтырка",'country_id'=>"1"],
                ['title'=>"Белополье",'country_id'=>"1"],
                ['title'=>"Бурынь",'country_id'=>"1"],
                ['title'=>"Глухов",'country_id'=>"1"],
                ['title'=>"Кролевец",'country_id'=>"1"],
                ['title'=>"Конотоп",'country_id'=>"1"],
                ['title'=>"Лебедин",'country_id'=>"1"],
                ['title'=>"Путивль",'country_id'=>"1"],
                ['title'=>"Ромны",'country_id'=>"1"],
                ['title'=>"Середина-Буда",'country_id'=>"1"],
                ['title'=>"Сумы",'country_id'=>"1"],
                ['title'=>"Тростянец",'country_id'=>"1"],
                ['title'=>"Шостка",'country_id'=>"1"],
                ['title'=>"Бережаны",'country_id'=>"1"],
                ['title'=>"Борщёв",'country_id'=>"1"],
                ['title'=>"Бучач",'country_id'=>"1"],
                ['title'=>"Залещики",'country_id'=>"1"],
                ['title'=>"Збараж",'country_id'=>"1"],
                ['title'=>"Зборов",'country_id'=>"1"],
                ['title'=>"Кременец",'country_id'=>"1"],
                ['title'=>"Лановцы",'country_id'=>"1"],
                ['title'=>"Монастыриска",'country_id'=>"1"],
                ['title'=>"Подволочиск",'country_id'=>"1"],
                ['title'=>"Подгайцы",'country_id'=>"1"],
                ['title'=>"Почаев",'country_id'=>"1"],
                ['title'=>"Скалат",'country_id'=>"1"],
                ['title'=>"Тернополь",'country_id'=>"1"],
                ['title'=>"Теребовля",'country_id'=>"1"],
                ['title'=>"Чортков",'country_id'=>"1"],
                ['title'=>"Шумск",'country_id'=>"1"],
                ['title'=>"Балаклея",'country_id'=>"1"],
                ['title'=>"Барвенково",'country_id'=>"1"],
                ['title'=>"Богодухов",'country_id'=>"1"],
                ['title'=>"Валки",'country_id'=>"1"],
                ['title'=>"Великий Бурлук",'country_id'=>"1"],
                ['title'=>"Волчанск",'country_id'=>"1"],
                ['title'=>"Дергачи",'country_id'=>"1"],
                ['title'=>"Змиев",'country_id'=>"1"],
                ['title'=>"Изюм",'country_id'=>"1"],
                ['title'=>"Красноград",'country_id'=>"1"],
                ['title'=>"Купянск",'country_id'=>"1"],
                ['title'=>"Лозовая",'country_id'=>"1"],
                ['title'=>"Люботин",'country_id'=>"1"],
                ['title'=>"Мерефа",'country_id'=>"1"],
                ['title'=>"Первомайский",'country_id'=>"1"],
                ['title'=>"Харьков",'country_id'=>"1"],
                ['title'=>"Чугуев",'country_id'=>"1"],
                ['title'=>"Берислав",'country_id'=>"1"],
                ['title'=>"Геническ",'country_id'=>"1"],
                ['title'=>"Голая Пристань",'country_id'=>"1"],
                ['title'=>"Каховка",'country_id'=>"1"],
                ['title'=>"Новая Каховка",'country_id'=>"1"],
                ['title'=>"Скадовск",'country_id'=>"1"],
                ['title'=>"Таврийск",'country_id'=>"1"],
                ['title'=>"Херсон",'country_id'=>"1"],
                ['title'=>"Цюрупинск",'country_id'=>"1"],
                ['title'=>"Волочиск",'country_id'=>"1"],
                ['title'=>"Городок",'country_id'=>"1"],
                ['title'=>"Деражня",'country_id'=>"1"],
                ['title'=>"Дунаевцы",'country_id'=>"1"],
                ['title'=>"Изяслав",'country_id'=>"1"],
                ['title'=>"Каменец-Подольский",'country_id'=>"1"],
                ['title'=>"Красилов",'country_id'=>"1"],
                ['title'=>"Нетешин",'country_id'=>"1"],
                ['title'=>"Полонное",'country_id'=>"1"],
                ['title'=>"Славута",'country_id'=>"1"],
                ['title'=>"Староконстантинов",'country_id'=>"1"],
                ['title'=>"Хмельницкий",'country_id'=>"1"],
                ['title'=>"Шепетовка",'country_id'=>"1"],
                ['title'=>"Ватутино",'country_id'=>"1"],
                ['title'=>"Городище",'country_id'=>"1"],
                ['title'=>"Жашков",'country_id'=>"1"],
                ['title'=>"Звенигородка",'country_id'=>"1"],
                ['title'=>"Золотоноша",'country_id'=>"1"],
                ['title'=>"Каменка",'country_id'=>"1"],
                ['title'=>"Канев",'country_id'=>"1"],
                ['title'=>"Корсунь-Шевченковский",'country_id'=>"1"],
                ['title'=>"Монастырище",'country_id'=>"1"],
                ['title'=>"Смела",'country_id'=>"1"],
                ['title'=>"Тальное",'country_id'=>"1"],
                ['title'=>"Умань",'country_id'=>"1"],
                ['title'=>"Христиновка",'country_id'=>"1"],
                ['title'=>"Черкассы",'country_id'=>"1"],
                ['title'=>"Чигирин",'country_id'=>"1"],
                ['title'=>"Шпола",'country_id'=>"1"],
                ['title'=>"Бахмач",'country_id'=>"1"],
                ['title'=>"Бобровица",'country_id'=>"1"],
                ['title'=>"Борзна",'country_id'=>"1"],
                ['title'=>"Городня",'country_id'=>"1"],
                ['title'=>"Десна",'country_id'=>"1"],
                ['title'=>"Ичня",'country_id'=>"1"],
                ['title'=>"Корюковка",'country_id'=>"1"],
                ['title'=>"Мена",'country_id'=>"1"],
                ['title'=>"Нежин",'country_id'=>"1"],
                ['title'=>"Новгород-Северский",'country_id'=>"1"],
                ['title'=>"Носовка",'country_id'=>"1"],
                ['title'=>"Прилуки",'country_id'=>"1"],
                ['title'=>"Седнев",'country_id'=>"1"],
                ['title'=>"Семёновка",'country_id'=>"1"],
                ['title'=>"Чернигов",'country_id'=>"1"],
                ['title'=>"Щорс",'country_id'=>"1"],
                ['title'=>"Вашковцы",'country_id'=>"1"],
                ['title'=>"Вижница",'country_id'=>"1"],
                ['title'=>"Герца",'country_id'=>"1"],
                ['title'=>"Заставна",'country_id'=>"1"],
                ['title'=>"Кицмань",'country_id'=>"1"],
                ['title'=>"Новоднестровск",'country_id'=>"1"],
                ['title'=>"Новоселица",'country_id'=>"1"],
                ['title'=>"Сокиряны",'country_id'=>"1"],
                ['title'=>"Сторожинец",'country_id'=>"1"],
                ['title'=>"Хотин",'country_id'=>"1"],
                ['title'=>"Черновцы",'country_id'=>"1"],
                [
                    'title'=>"Варшава",
                    'country_id'=>"2"
                ],
                [
                    'title'=>"Гданськ",
                    'country_id'=>"2"
                ],
                [
                    'title'=>"Прага",
                    'country_id'=>"3"
                ],
                [
                    'title'=>"Брно",
                    'country_id'=>"3"
                ],
            ]
        );


    }
}
