<link href="<?php echo base_url()?>css/kendo.common.min.css" rel="stylesheet" />
<link href="<?php echo base_url()?>css/kendo.bootstrap.min.css" rel="stylesheet" />
<script src="<?php echo base_url()?>js/kendo.all.min.js"></script>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>รายงานการขาย <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Stock List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('report/report_sale_search')?>
  <table width="90%" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td width="12%" align="center">เริ่มต้น</td>
      <td width="12%" align="center"><input type="text" name="start" id="start" value="<?php echo date('Y-m-d')?>" /></td>
      <td width="12%" align="center">สิ้นสุด</td>
      <td width="12%" align="center"><input type="text" name="end" id="end" value="<?php echo date('Y-m-d')?>" /></td>
      <td width="12%" align="center">เลือกร้านขาย</td>
      <td width="24%"><select name="shop" id="shop" class="form-control" style="width:80%;">
        <option value="">-- เลือกร้านขาย --</option>
        <?php foreach($shop as $shop){ ?>
        <option value="<?php echo $shop['shop_id']?>"><?php echo $shop['shop_details']?></option>
        <?php } ?>
      </select></td>
      <td width="64%"><input type="submit" name="button" id="button" class="btn btn-info" value="ค้นหาข้อมูล" /></td>
    </tr>
  </table>
  <?php echo form_close()?>
  <p></p>
  <?php if(@$changes[0]['stock_id']!=""){ ?>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th><div align="center">ลำดับ</div></th>
        <th><div align="center">รายการสินค้า <i class="fa fa-sort"></i></div></th>
        <th><div align="center">วันที่ <i class="fa fa-sort"></i></div></th>
        <th><div align="center">เวลา <i class="fa fa-sort"></i></div></th>
        <th><div align="center">จำนวน <i class="fa fa-sort"></i></div></th>
        <th><div align="center">ราคาต่อหน่วย <i class="fa fa-sort"></i></div></th>
        <th><div align="center">ราคารวม <i class="fa fa-sort"></i></div></th>
        <th><div align="center">ร้านขาย <i class="fa fa-sort"></i></div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($changes as $changes){ ?>
      <?php $total[] = ($changes['product_sale']*$changes['stock_amount'])?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $changes['product_name']?></td>
        <td><?php echo $changes['stock_date']?></td>
        <td><?php echo $changes['stock_time']?></td>
        <td><div align="right"><?php echo $changes['stock_amount']?> หน่วย</div></td>
        <td><div align="right"><?php echo $changes['product_sale']?> บาท</div></td>
        <td><div align="right"><?php echo ($changes['product_sale']*$changes['stock_amount'])?> บาท</div></td>
        <td><?php echo $changes['shop_details']?> (<?php echo $changes['shop_zone']?>)</td>
      </tr>
      <?php $i++ ?>
	  <?php } ?>
      <tr>
        <td colspan="6"><div align="center">รวมทั้งหมด</div></td>
        <td><div align="right"><?php echo number_format(array_sum($total))?> บาท</div></td>
        <td>&nbsp;</td>
      </tr>
    </tbody>
  </table>
  <?php } ?>
</div>
<script>
            $(document).ready(function() {
                $("#start").kendoDatePicker({format: "yyyy-MM-dd"});
                $("#end").kendoDatePicker({format: "yyyy-MM-dd"});
            });
</script>
