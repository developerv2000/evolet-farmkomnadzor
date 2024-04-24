<p>От: {{ $request->reporter_name }} <{{ $request->email }}></p>
<p>Тема: Сообщение о жалобе на продукт</p>
<br>
<p>Сообщение:</p>
<p>Инициалы пациента: {{ $request->patient_initial }}</p>
<p>Возраст (лет): {{ $request->age }}</p>
<p>Вес (кг): {{ $request->weight }}</p>
<p>Рост (см): {{ $request->height }}</p>
<p>Нежелательная реакция: {{ $request->event }}</p>
<p>Лекарственные средства, предположительно вызвавшие НР: {{ $request->drugs }}</p>
<p>Имя сообщающего лица: {{ $request->reporter_name }}</p>
<p>Электронная почта сообщающего лиц: {{ $request->email }}</p>
<p>Номер мобильного телефона сообщающего лица: {{ $request->phone }}</p>
<p>--</p>
<p>Это сообщение было отправлено с сайта: {{ $request->header('referer') }}</p>
