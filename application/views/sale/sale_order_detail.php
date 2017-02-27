<script>
function getfocus(){
  document.getElementById('barcode').focus();
}
</script>
<body onLoad="getfocus()">
  <div id="page-wrapper">
    <div class="row">
      <div class="col-lg-12">
        <h1>การขาย <small>ระบบบริหารจัดการคลังสินค้า Bhuvarat Fishing Net.</small></h1>
        <ol class="breadcrumb">
          <li class="active"><i class="fa fa-sitemap"></i> Shop Open</li>
        </ol>
      </div>
    </div>
    <!-- /.row -->
    <table width="60%" border="0" align="center" cellpadding="5" cellspacing="5">
      <tr>
        <td width="61%">
          <div align="center">
              <a href="" class="btn btn-primary">ออกใบเสร็จ</a>
              <p></p>
          </div>
        </td>
      </tr>
      <?php echo form_open('sale_manage/sale_insert')?>
      <tr>
        <td>
          <div align="center"><h3>รายละเอียดใบเสร็จ</h3></div><br>
        </td>
      </tr>
      <tr>
        <td height="50">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                ชื่อ :<?php echo $sale_order_detail[0]['member_fullname']?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                เบอร์โทรศัพท์ :<?php echo $sale_order_detail[0]['member_phone']?>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <?php if ($sale_order_detail[0]['sale_order_detail_pay_type']==1): ?>
                  <div class="form-group btn btn-danger">
                    เงินสด
                  </div>
                <?php elseif($sale_order_detail[0]['sale_order_detail_pay_type']==2): ?>
                  <div class="form-group btn btn-warning">
                    เช็ค
                  </div>
                <?php else: ?>
                  <div class="form-group btn btn-primary">
                    เครดิต
                  </div>
                <?php endif; ?>
              </div>
            </div>
            <div class="col-md-1">
              <div class="form-group">
                <?php if ($sale_order_detail[0]['sale_order_detail_vat']==1): ?>
                  <div class="form-group btn btn-warning">
                    VAT
                  </div>
                <?php else: ?>
                  <div class="form-group btn btn-info">
                    ไม่ VAT
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td height="50">
          <div class="row">
            <div class="col-md-8">
              <div class="form-group">
                ที่อยู่ :<?php echo $sale_order_detail[0]['member_address']?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td height="50">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                หมายเหตุ :<?php echo $sale_order_detail[0]['member_note']?>
              </div>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td><table width="100%" border="1" cellspacing="0" cellpadding="0">
          <tr>
            <td height="40" colspan="5">&nbsp;&nbsp;&nbsp;<strong>รายการสินค้า ( Product List )</strong></td>
          </tr>
          <tr>
            <td width="9%" align="center">ลำดับ</td>
            <td width="50%" align="center">รายการสินค้า</td>
            <td width="19%" align="center">ราคาต่อหน่วย</td>
            <td width="9%" align="center">จำนวน</td>
            <td width="13%" height="40" align="center">ราคารวม</td>
          </tr>
          <?php for($i=0;$i<30;$i++){ ?>
            <?php $total[] = @$_SESSION['product'][$i]['product_sale']?>
            <?php if(@$_SESSION['product'][$i]['product_key']!=""){ ?>
              <tr>
                <td><div align="center"><?php echo ($i+1) ?></div></td>
                <td>&nbsp;<?php echo @$_SESSION['product'][$i]['product_code']?> <?php echo @$_SESSION['product'][$i]['product_name']?><input name="product_code[]" id="product_code[]" type="hidden" value="<?php echo @$_SESSION['product'][$i]['product_code']?>" /> <?php echo anchor('sale/sale_list_delete/'.@$_SESSION['product'][$i]['product_key'],'<i class="fa fa-trash-o"></i>')?></td>
                <td><div align="right"><?php echo @$_SESSION['product'][$i]['product_sale']?>.00&nbsp;</div></td>
                <td><div align="center">1</div></td>
                <td height="40"><div align="right"><?php echo @$_SESSION['product'][$i]['product_sale']?>.00&nbsp;</div></td>
              </tr>
              <?php } ?>
              <?php } ?>
              <tr>
                <td colspan="2" align="center"><strong>รวมทั้งหมด</strong></td>
                <td><div align="right"><?php echo @number_format(@array_sum(@$total))?>.00&nbsp;</div></td>
                <td><div align="center"><?php echo count(@$_SESSION['product'])?></div></td>
                <td height="40"><div align="right"><?php echo @number_format(@array_sum(@$total))?>.00&nbsp;</div></td>
              </tr>
            </table></td>
            </tr>
            <?php echo form_close()?>
          </table>
        </div>
      </body>
