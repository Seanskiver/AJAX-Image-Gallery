<form id="imageForm" action="." method="post" enctype="multipart/form-data">
    <input type="hidden" name="action" value="upload">
    <input type="text" name="title"><br>
    <input type="text" name="description"><br>
    <input type="file" name="imageUpload" id="imageUpload"><br>
    <input type="submit" value="Upload Image" name="submit">
</form>
<span id="errors"></span>
<span id="success"></span>