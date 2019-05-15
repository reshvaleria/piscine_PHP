<?php
session_start();
include ('pages/head.php');
include ('pages/navigation.php');
?>
<h2>Доставка и оплата</h2>
    <div class="table">
        <p>Минимальная сумма заказа - 500 рублей.</p>
        <p>Заказы поступившие:</p>
        <ul>
            <li><b>до 14.00:</b> доставка на следующий рабочий день.</li>
            <li><b>после 14.00:</b> доставка через один рабочий день.</li>
        </ul>
        <p>Временные промежутки доставки:</p>
        <ul>
            <li>с 9.00 до 15.00;</li>
            <li>с 15.00 до 21.00</li>
        </ul>
</div>
<div>
<table class="table">
    <tr><th class="table_head"><h3>Курьером по Москве внутри МКАД</h3></th>
        <td class="table_content"><ul><li>При заказе до 3000 рублей: стоимость доставки 300 рублей.</li>
                <li>При заказе больше 3000 рублей: доставка БЕСПЛАТНО.</li></ul></td></tr>
    <tr> <th class="table_head"><h3>Доставка курьером по Москве за МКАД</h3></th>
    <td class="table_content"><p>Осуществляется в пределах пешей доступности от метро.
                    При заказе до 5000 рублей: стоимость доставки 350 рублей.
                    При заказе больше 5000 рублей: доставка БЕСПЛАТНО.
                    Доставка за МКАД, где нет метро, осуществляется по договоренности по тарифу 300 рублей
            + 30 рублей за каждый км от МКАД</p></td></tr>
    <tr> <th class="table_head"><h3>Самовывоз БЕСПЛАТНО</h3></th>
    <td class="table_content"><p>Из шоурума в Москве по адресу: ул. Воронцовская, д. 27/35 с1
            (цокольный этаж)
            по предварительной договоренности</p></td></tr>
    <tr> <th class="table_head"><h3>Доставка по России</h3></th>
    <td class="table_content"><p>Транспортной компанией Boxberry или Почтой России от 180 руб.</p></td></tr>

</table>
</div>
<?php
include('pages/footer.php');
?>