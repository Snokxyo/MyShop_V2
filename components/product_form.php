<section class="form">
    <div class="container">
        <h1 class="catalog-title">Добавление товара</h1>
        <form method="post" action="../createproduct.php" enctype="multipart/form-data">
            <p>
                <label for="id1">Наименование:</label>
                <input type="text" name="name" id="id1">
            </p>
            <p>
                <label for="id2">Описание:</label>
                <input type="text" name="description" id="id2">
            </p>
            <p>
                <label for="id3">Цена:</label>
                <input type="text" name="price" id="id3">
            </p>
            <p>
                <label for="id4">Изображение:</label>
                <input type="file" name="picture[]" id="id4" multiple>
            </p>
            <p>
            <p><input type="button" value="Создать" onclick="validate(this.form)"></p>
        </form>
    </div>
</section>
<script>
    function validate(xxx) {
        if (xxx.name.value === '')
            alert("Пожалуйста, введите имя!");
    else if (!Number.isInteger(parseInt(xxx.price.value)) || (String(parseInt(xxx.price.value)) !== xxx.price.value) || parseInt(xxx.price.value) < 0)
            alert("Цена должна быть целым положительным числом!");
   //     else if (xxx.picture.value === "")
       //     alert("Файл отсутствует, загрузите файл!");
     //   else if (xxx.picture.value.match(/\.([a-zA-Z]+)$/i)[1] !== "png")
         //   alert("Файл должен быть с расширением: png");
        else {
            alert("Форма заполнена корректно");
            xxx.submit();
        }
        //      else {
        //     ext = picture.value.match(/\.([a-zA-Z]+)$/i);
        //     if (ext[1] !== 'png') {
        //         alert('Файл должен быть с расширением: png');
        //     }
        //     else {
        //         alert("Форма заполнена корректно.");
        //         xxx.submit();
        //     }
    }
</script>
