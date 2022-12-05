<h3 class="text-center">調查列表</h3>
<div class="my-4 text-center">
    <a href="admin_center.php?do=survey_add" class="btn btn-primary">新增調查</a>
</div>

<ul class="list-group col-md-10 m-auto">
    <li class="d-flex text-center list-group-item list-group-item-info list-group-item-action">
        <div class="col-7">主題</div>
        <div class="col-2">參與數</div>
        <div class="col-3">操作</div>
    </li>
    <li class="d-flex list-group-item list-group-item-light list-group-item-action">
        <div class="col-7 font-weight-bolder" style="font-size:1.25rem">Lorem ipsum dolor sit</div>
        <div class="col-2 text-center">0</div>
        <div class="col-3 text-center">
            <a href="./api/survey_active.php?id=" class="btn btn-sm btn-secondary mx-1">啟用</a>
            <a href="admin_center.php?do=survey_edit&id=" class="btn btn-sm btn-success mx-1">編輯</a>
            <a href="./api/survey_del.php?id=" class="btn btn-sm btn-info mx-1">刪除</a>
        </div>
    </li>
</ul>