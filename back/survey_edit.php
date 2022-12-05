<h3 class="text-center">編輯調查</h3>

<form action="./api/survey_edit.php" class="col-10 mx-auto d-flex flex-wrap justify-content-end" method="post">
    <div class="form-group row col-12">
            <label class="col-2 text-right">主題</label>
            <input type="text" class="form-control col-10">
        </div> 
        <!--選項區-->
            <div class="form-group row col-11">
                <label class="col-2 text-right">項目１</label>
                <input type="text" class="form-control col-10">
            </div>    
            <div class="form-group row col-11">
                <label class="col-2 text-right">項目２</label>
                <input type="text" class="form-control col-10">
            </div>    
    <div class="text-center col-12 mt-3">
        <input class="btn btn-primary mx-1" type="submit" value="修改">
        <input class="btn btn-warning mx-1" type="reset" value="重置">
    </div>
</form>