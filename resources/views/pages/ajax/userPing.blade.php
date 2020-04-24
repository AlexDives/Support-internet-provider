<textarea style="overflow: hidden; resize: none; width: 100%; height: 400px; background: #fff; border: none; color: black; font-size: 15px;" id="pip" disabled>{{ $resultPing }}</textarea>
<div class="card-footer text-muted ping-c">
    <div class='row'>
        <div class='col-md-5'>
            <input type="text" class="form-control" placeholder="Комментарий" name="comment" id="comment">
        </div>
        <div class='col-md-2'>
            <div class="form-group">
                <label class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="3" name="visov" id="visov">
                    <span class="custom-control-label">Крестик</span>
                </label>
            </div>
        </div>
        <div class='col-md-2'>
            <div class="form-group">
                <label class="custom-control custom-radio">
                    <input type="radio" class="custom-control-input" value="5" name="visov" id="visov">
                    <span class="custom-control-label">Вызов</span>
                </label>
            </div>
        </div>
        <div class='col-md-3'>
            <div class="form-group">
                <button type="button" class="btn btn-sm btn-outline-primary" onclick="quickRequest();">Быстрая заявка</button>
            </div>
        </div>
    </div>
</div>