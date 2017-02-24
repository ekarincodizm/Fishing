<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>สต๊อกสินค้าของร้าน <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-th-large"></i> Stock List</li>
      </ol>
    </div>
  </div>
  <!-- /.row -->
  <?php echo form_open('stock/stock_list_shop')?>
  <table width="90%" border="0" cellspacing="5" cellpadding="5">
    <tr>
      <td width="12%" align="center">เลือกร้านขาย</td>
      <td width="24%"><select name="employees_shop" id="employees_shop" class="form-control" style="width:80%;" required="required" onchange="this.form.submit()">
        <option value="">-- เลือกร้านขาย --</option>
        <?php foreach($shop as $shop){ ?>
        <option value="<?php echo $shop['shop_id']?>"><?php echo $shop['shop_details']?></option>
        <?php } ?>
      </select></td>
      <td width="64%" align="center">&nbsp;</td>
    </tr>
  </table>
  <?php echo form_close()?>
  <p></p>
  <?php if(@$employees_shop!=""){ ?>
  <table class="table table-bordered table-hover table-striped tablesorter">
    <thead>
      <tr>
        <th width="5%"><div align="center">ลำดับ</div></th>
        <th width="15%"><div align="center">รหัสสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">ประเภทสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="25%"><div align="center">ชื่อสินค้า <i class="fa fa-sort"></i></div></th>
        <th width="10%"><div align="center">หน่วย</div></th>
        <th width="15%"><div align="center">จำนวนคงเหลือ <i class="fa fa-sort"></i></div></th>
        <th width="15%"><div align="center">สถานะ</div></th>
      </tr>
    </thead>
    <tbody>
    <?php $confirm = array( 'onclick' => "return confirm('ต้องการลบข้อมูลหรือไม่?')");?>
      <?php $i = 1 ?>
	  <?php foreach($product as $product){ ?>
      <tr>
        <td><div align="center"><?php echo $i ?></div></td>
        <td><?php echo $product['product_code']?></td>
        <td><?php echo $product['category_name']?></td>
        <td><?php echo $product['product_name']?></td>
        <td align="center"><?php echo $product['product_unit']?></td>
        <td><div align="center">
        <?php
      $this->db->select_sum('stock_amount');
			$this->db->where('stock_product',$product['product_code']);
			$this->db->where('stock_shop',@$employees_shop);
			$this->db->where('stock_type','in');
			$in = $this->db->get('stock');
			$in_stock_amount = $in->result_array();

			$this->db->select_sum('stock_amount');
			$this->db->where('stock_product',$product['product_code']);
			$this->db->where('stock_shop',@$employees_shop);
			$this->db->where('stock_type','out');
			$out = $this->db->get('stock');
			$out_stock_amount = $out->result_array();

			echo number_format($stock_amount = ((@$in_stock_amount[0]['stock_amount']+0) - (@$out_stock_amount[0]['stock_amount']+0)));
		?>
        </div></td>
        <td><div align="center">
        <?php
        	// if(($product['product_limit_max']/4)<$stock_amount){
          if(($product['product_limit_max'])<$stock_amount){
				echo "<span style='color:green;'>คงเหลือปกติ</span>";
			}else{
				echo "<span style='color:red;'>คงเหลือน้อยกว่าเกณฑ์</span>";
			}
		?>
        </div></td>
      </tr>
      <?php $i++ ?>
	  <?php } ?>
    </tbody>
  </table>
  <?php } ?>
</div>