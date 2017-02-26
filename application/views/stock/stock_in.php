<script>
function getfocus(){
	document.getElementById('stock_product').focus();
}
</script>
<body onLoad="getfocus()">
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>นำสินค้าเข้าในสต๊อก <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th"></i> Stock In</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('stock_manage/stock_in')?>
  <table width="85%" border="0" align="center" cellpadding="5" cellspacing="5">
		<tr>
			<td width="15%" height="50">ชื่อสินค้า</td>
			<td width="24%"><select name="stock_product" id="stock_product" class="form-control" style="width:80%;" required>
				<option value="">-- เลือกสินค้า --</option>
				<?php foreach($allproduct as $row){ ?>
				<option value="<?php echo $row['product_code']?>"><?php echo $row['product_name']?></option>
				<?php } ?>
			</select></td>
      <td width="15%">จำนวนนำเข้า</td>
      <td width="35%" height="50"><input type="text" name="stock_amount" id="stock_amount" class="form-control" style="width:35%; text-align:right;" placeholder="จำนวน" required /></td>
    </tr>
    <tr>
      <td height="100" colspan="4"><div align="center">
          <input type="submit" class="btn btn-primary" value="บันทึกข้อมูล">
          <input type="reset" class="btn btn-danger" value="ยกเลิก">
        </div></td>
    </tr>
  </table>
  <?php echo form_close()?>
</div>
</body>
