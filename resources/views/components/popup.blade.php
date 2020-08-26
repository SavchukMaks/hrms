{{--

    Як юзати?
        Інклудимо цей блейд в потрібну сторінку в кінці <main></main>

        В JS пишемо код для відкривання попапу:

        showPopup(target, popup)
        target - Елемент на який клікаємо
        popup - Елемент попап

        І підключаємо до сторінки файл base/_popup.sass

--}}

<div class="popup-wrapper"></div>

<div class="popup" id="send-message-popup">
    <div class="header-popup">

        <div class="title-popup">
            <img src="{{ asset('img/small-whb.jpg') }}" alt="">
            <h3>Text Message for Fedarovich Mikalai</h3>
        </div>
        <div id="close-popup" class="close-popup">
            ×
        </div>
    </div>
    <div class="content-popup">
        <form action="{{ route('page_add_candidates') }}" method="POST">

            {{ csrf_field() }}

            <input type="hidden" name="vacancyID">
            <textarea name="message" id="message" cols="30" rows="5" placeholder="Text Message" minlength="10" maxlength="2000"></textarea>
        </form>
        <div class="footer-popup">
            <button class="save-btn">Send</button>
            <button class="reset-btn close-popup">Close</button>
        </div>
    </div>
</div>