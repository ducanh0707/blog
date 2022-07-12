<div class="form-group">
    <label class="font-weight-bold"> Mã nhúng bản đồ Google <a href="https://www.google.com/maps" target="_blank">Lấy Mã</a></label>
    <textarea class="form-control" name="map_code">{{$row->map_code}}</textarea>
    <br>
    <?php echo html_entity_decode($row->map_code); ?>
 </div>