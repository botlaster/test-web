<?php
include_once "page3.php";
?>
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#e5772c;color:white;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i> ปิด</span></button>
        <h4 ng-show="modalFormData.isHide == true" class="modal-title" id="gridSystemModalLabel">
          ห้อง 101 <button class="btn btn-xs btn-orange" ng-click="editRoomId()">แก้ไขชื่อห้อง</button>
        </h4>
        <form class="form-inline ng-pristine ng-hide ng-valid ng-valid-required" name="formEditRoomId" ng-show="modalFormData.isHide == false" ng-submit="saveRoomId(modalFormData.roomId)">
          <div class="form-group">
            <input type="text" class="form-control ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" ng-model="modalFormData.roomId" required="" placeholder="หมายเลขห้อง">
          </div>
          <button type="submit" ng-disabled="formEditRoomId.$invalid || modalFormData.isLoading" class="btn btn-green btn-xs">
            <i class="fa fa-spin fa-spinner ng-hide" ng-show="modalFormData.isLoading"></i><span ng-hide="modalFormData.isLoading">บันทึก</span>
          </button>
        </form>
      </div>
      <div class="modal-body clearfix">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist" id="myTabs">
          <!--li role="presentation" class="active"><a data-target="#feeds" aria-controls="feeds" role="tab" data-toggle="tab">Feeds</a></li-->
          <li ng-show="modalPayData.room.isVacant == true" role="presentation" class="active">
            <a data-target="#booking" aria-controls="booking" role="tab" data-toggle="tab" aria-expanded="true">
              <img width="25px" src="images/icon/room-tab/reserve.png" alt=""> จองห้อง
          </a></li>
          <li role="presentation" ng-hide="modalPayData.room.isCheckedIn" class="">
            <a data-target="#home" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="false">
              <img width="25px" src="images/icon/room-tab/renter.png" alt=""> ผู้เช่า
          </a></li>
          <li role="presentation" ng-hide="modalPayData.room.isCheckedIn" class=""><a data-target="#contract" aria-controls="contract" role="tab" data-toggle="tab" aria-expanded="false">
            <span ng-show="modalPayData.room.isVacant == true" class=""><img width="25px" src="images/icon/room-tab/checkin.png" alt=""> เข้าพัก</span>
            <span ng-show="modalPayData.room.isVacant == false" class="ng-hide"><img width="25px" src="images/icon/room-tab/rent-license.png" alt=""> สัญญาเช่า</span>
          </a></li>
          <li ng-show="modalPayData.room.isVacant == false" role="presentation" class="ng-hide">
            <a data-target="#receipt" aria-controls="receipt" role="tab" data-toggle="tab">
              <img width="25px" src="images/icon/room-tab/paid.png" alt=""> ชำระเงิน
          </a></li>
          <!---->
          <li ng-show="modalPayData.room.isVacant == false" role="presentation" class="ng-hide">
            <a data-target="#checkout" aria-controls="receipt" role="tab" data-toggle="tab">
              <img width="25px" src="images/icon/room-tab/move-out.png" alt=""> ย้ายออก
          </a></li>
          <li role="presentation" class="">
            <a data-target="#report" aria-controls="report" role="tab" data-toggle="tab" aria-expanded="false">
              <img width="25px" src="images/icon/room-tab/apartmentreport.png" alt=""> การแจ้ง
            </a></li>
          <li ng-show="apartment &amp;&amp; apartment.get('setting') &amp;&amp; apartment.get('setting').get('cpMeterData')" role="presentation" class="ng-hide">
            <a data-target="#digitalmeter" aria-controls="digitalmeter" role="tab" data-toggle="tab">
              <img width="25px" src="images/icon/room-tab/electric-meter-icon.png" alt=""> Digital Meter
          </a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <div role="tabpanel" class="tab-pane" id="home">
            <div class="container">
              <!---->
              <div class="row">
                <!-- Renter requests -->
                <!---->
                <!-- Renter SMS requests -->
                <!---->
              <!-- Renter Current -->
              <!---->
          </div>
          <!----><div class="row" ng-if="!isLoadingRenter &amp;&amp; (!renters[modalPayData.room.id] || renters[modalPayData.room.id].length == 0) &amp;&amp; (!modalRenterRequestData || modalRenterRequestData.length == 0) &amp;&amp; (!modalRenterInviteData || modalRenterInviteData.length == 0)">
            <div class="col-xs-12 col-lg-6 col-lg-offset-3">
              <img class="center-block hint-img" style="padding:25px;" src="images/dash/renter.png">
              <div class="well well-sm text-center">Horganice ID : <b>jlkjlk</b></div>
              <hr>
            </div>
            <div class="col-xs-12 text-center" style="margin-bottom:5px">
              หรือ
            </div>
          </div><!---->
          <div class="row">
            <div class="col-xs-12 text-center" style="margin-bottom:5px">
              <button class="btn btn-info btn-lg" ng-click="modalInvite()">
                <i class="fa fa-plus"></i> เพิ่มข้อมูลผู้เช่า
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- Contract Tabs -->
      <div role="tabpanel" class="tab-pane" id="contract">
        <div class="container">
          <!---->
          <!----><div class="row text-center" ng-if="modalContractData.room.isVacant == true">
            <button class="btn btn-green" ng-click="checkin()">เข้าพักรายเดือน</button>
          </div><!---->
        </div>
      </div>

      <div role="tabpanel" class="tab-pane" id="receipt">
        <div class="container">
          <div class="row">
            <div class="col-xs-12 text-center ng-hide" ng-show="modalLoadingRoomData.receipt">
              <i class="fa fa-spinner fa-spin fa-2x"></i>
            </div>
            <!----><div class="col-xs-12 text-center" ng-if="!modalPayData.receipt.roomCost &amp;&amp; !modalLoadingRoomData.receipt">
              ยังไม่มีบิล
            </div><!---->
            <!---->
            <!---->
            <!-- Pay Data -->
            <!---->
            <!---->
            <!---->
        </div> <!-- End Main Row -->
      </div>
    </div>

    <!-- Check Out -->
    <div role="tabpanel" class="tab-pane" id="checkout">
      <div class="container">
        <div class="row">
          <div class="col-xs-12" id="contractDetail">
            <div class="alert alert-info text-center" role="alert">
              <i class="fa fa-info-circle" aria-hidden="true"></i> ขั้นตอนการย้ายออกจะมี 3 ขั้นตอน ได้แก่ 1. เคลียร์บิลค้างชำระ 2. ออกใบเสร็จย้ายออก 3. กรอกรายการคืนเงินประกัน
            </div>
            <div class="well clearfix">
              <div class="col-xs-12">
                <h4><b><i class="fa fa-handshake-o" aria-hidden="true"></i> รายละเอียดสัญญาเช่า</b></h4>
              </div>
              <div class="col-md-6">
                วันที่ทำสัญญา :
                <b ng-show="modalContractData.room.contract.get('startDate')" class="ng-hide"></b>
                <b ng-show="!modalContractData.room.contract.get('startDate')">ไม่มีข้อมูล</b>
              </div>
              <div class="col-md-6">
                วันที่สิ้นสุดสัญญา :
                <b ng-show="modalContractData.room.contract.get('endDate')" class="ng-hide"></b>
                <b ng-show="!modalContractData.room.contract.get('endDate')">ไม่มีข้อมูล</b>
              </div>
              <div class="col-md-6 ng-hide" ng-show="modalContractData.room.contract.get('endDate')">
                สถานะสัญญา :
                <!---->
                <!----><b class="text-green" ng-if="!isEndContract(modalContractData.room.contract.get('endDate'))">ยังไม่หมดสัญญา</b><!---->
              </div>
              <div class="col-md-6 ng-hide" ng-show="modalContractData.room.contract.get('insuranceCost')">
                เงินประกัน :
                <b>0 บาท</b>
              </div>
              <div class="col-md-12 ng-hide" ng-show="modalContractData.room.contract.get('note')" style="margin-top:10px">
                <b>หมายเหตุ : </b>
              </div>
            </div>
          </div>
          <!----><div class="col-xs-12" ng-if="modalCheckOut">
            <section ng-show="modalCheckOut.step >= 1" id="checkout_step1">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <div class="alert alert-warning" role="alert">
                    <span class="label label-warning">STEP 1</span>
                     <b>เคลียร์บิลค้างชำระ</b> หากมีบิลค้างชำระกรุณาเปลี่ยนสถานะบิลให้เป็นชำระแล้ว จากนั้นคลิกปุ่ม
                     <b>ไปขั้นตอนถัดไป <i class="fa fa-chevron-right" aria-hidden="true"></i></b>
                  </div>
                  <h4>
                    <b><i class="fa fa-file-text-o" aria-hidden="true"></i> รายการบิล</b>
                  </h4>
                  <div class="col-xs-12">
                    <!----><div class="well text-center" ng-if="modalCheckOut.unpaidReceipts &amp;&amp; modalCheckOut.unpaidReceipts.length == 0">ไม่มีบิลค่าเช่า</div><!---->
                    <!---->
                    <div class="col-xs-12 text-center">
                      <h4 class="text-red">ยอดค้างชำระ 0 บาท</h4>
                    </div>
                    <div class="col-xs-12 text-center" ng-show="modalCheckOut.step == 1">
                      <button type="button" class="btn btn-blue btn-lg" ng-click="modalCheckOut.nextStep()">
                        ไปขั้นตอนถัดไป <i class="fa fa-chevron-right" aria-hidden="true"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </section>
            <section ng-show="modalCheckOut.step >= 2" id="checkout_step2" class="ng-hide">
              <!----><div class="panel panel-primary" ng-if="modalCheckOut">
                <div class="panel-body">
                  <div class="alert alert-warning" role="alert">
                    <span class="label label-warning">STEP 2</span>
                     <b>ออกใบเสร็จย้ายออก</b> หากมีการรับเงินเพิ่ม (เช่น ค่าปรับ,ค่าทำความสะอาด) หรือ ค่าน้ำ-ค่าไฟ (กรณีค่าน้ำ-ค่าไฟเพิ่มจากบิลล่าสุด) หากไม่มีให้คลิกปุ่ม
                     <b>ข้ามขั้นตอนนี้ <i class="fa fa-chevron-right" aria-hidden="true"></i></b>
                  </div>
                  <h4>
                    <b><i class="fa fa-file-text-o" aria-hidden="true"></i> ใบเสร็จย้ายออก</b>
                    <!---->
                  </h4>
                  <div class="col-xs-12">
                    <receipt-form apartment="apartment" form-data="modalCheckOut" renters="renters[modalPayData.room.id]" renter-wait-connect="renterWaitConnect[modalPayData.room.id]" disabled="modalPayData.room.contract.get('isCheckOutPaid')" modal-pay-data="modalPayData" receipt-type="checkout"><div class="row clearfix">
  <div class="col-xs-12 col-md-5">
    <div class="row">
      <div class="col-xs-12">
        <h5>รายละเอียดหัวบิล</h5>
      </div>
      <!---->
      <div class="col-xs-12" style="margin-bottom:5px">
        <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="ชื่อบริษัท/ชื่อลูกค้า" ng-model="formData.receiptForm.name" ng-disabled="disabled">
      </div>
      <div class="col-xs-12" style="margin-bottom:5px">
        <textarea class="form-control ng-pristine ng-untouched ng-valid ng-empty" rows="3" placeholder="รายละเอียดที่อยู่" ng-model="formData.receiptForm.address" ng-disabled="disabled"></textarea>
      </div>
      <div class="col-xs-7" style="margin-bottom:5px">
        <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="เลขประจำตัวผู้เสียภาษี" ng-model="formData.receiptForm.tax_id" ng-disabled="disabled">
      </div>
      <div class="col-xs-5" style="margin-bottom:5px">
        <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="สำนักงาน/สาขาเลขที่" ng-model="formData.receiptForm.department" ng-disabled="disabled">
      </div>
      <div class="col-xs-12" style="margin-bottom:15px">
        <input type="text" class="form-control ng-pristine ng-untouched ng-valid ng-empty" placeholder="หมายเลขโทรศัพท์" ng-model="formData.receiptForm.tel" ng-disabled="disabled">
      </div>
    </div>
  </div>
  <div class="col-xs-12 col-md-7">
    <h5>รายการชำระเงิน</h5>
    <!---->
    <table class="table table-bordered">
      <tbody><tr>
        <!---->
        <th>รายการ</th>
        <th>จำนวนเงิน(บาท)</th>
      </tr>
      <!---->
      <!---->
      <!----><tr ng-repeat="addCost in formData.addCost track by $index">
        <!---->
        <td>
          <div class="row">
            <div class="col-xs-12">
              <div class="form-inline">
                <button class="btn btn-red btn-xs" ng-click="removeAddCost($index)" ng-disabled="disabled">
                  ลบรายการ
                </button>
                <div class="form-group">
                  <input placeholder="กรุณากรอกรายละเอียด" class="form-control ng-pristine ng-untouched ng-valid ng-empty" type="text" ng-model="addCost.name" ng-disabled="disabled">
                </div>
              </div>
            </div>
          </div>
        </td>
        <td>
          <input class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" valid-number="" type="text" ng-model="addCost.cost" ng-disabled="disabled">
        </td>
      </tr><!---->
      <!---->
      <!----><tr ng-if="apartment.get('bussinessType') != 'company_vat'">
        <th>รวมทั้งหมด</th>
        <th>
          <b>0</b>
        </th>
      </tr><!---->
      <!---->
      <!---->
      <!---->
    </tbody></table>
    <!----><div class="col-xs-12 text-right" style="margin-bottom:10px" ng-if="!disabled">
      <!----><button class="btn btn-blue btn-sm" ng-click="modalAddFacCost()" ng-if="receiptType == 'checkout'">
          <i class="fa fa-plus"></i> ค่าน้ำ-ค่าไฟฟ้าสุดท้าย
      </button><!---->
      <!---->
      <!---->
      <button type="button" class="btn btn-green btn-sm" ng-click="addDiscount()">
        <i class="fa fa-minus"></i> เพิ่มส่วนลด
      </button>
      <button type="button" class="btn btn-orange btn-sm" ng-click="addAddCost()">
        <i class="fa fa-plus"></i> เพิ่มรายการ
      </button>
    </div><!---->
  </div>
  <div class="col-xs-12" style="margin-bottom:15px">
    <label>หมายเหตุ</label>
    <textarea class="form-control ng-pristine ng-untouched ng-valid ng-empty" row="2" ng-model="formData.note" ng-disabled="disabled">    </textarea>
  </div>
</div>
</receipt-form>
                  </div>
                  <div class="col-xs-12">
                    <!----><div class="row" ng-if="!modalPayData.room.contract.get('isCheckOutPaid')">
                      <div class="col-xs-12">
                        <div class="alert alert-info" role="alert">
                          <b>คำเตือน</b>
                          <ol>
                            <li>เมื่อมีการเพิ่มรายการ หรือเพิ่มส่วนลด ให้คลิกปุ่ม <b>"ชำระเงิน"</b> ทุกครั้ง เพื่อสร้างใบเสร็จรับเงิน</li>
                            <li>รายการทั้งหมดจะถูกแสดงในใบย้ายออกเมื่อคลิกปุ่ม <b>"ชำระเงิน"</b> แล้ว</li>
                          </ol>
                        </div>
                      </div>
                    </div><!---->
                    <div class="row">
                      <!----><div class="col-xs-12" ng-if="!modalPayData.room.contract.get('isCheckOutPaid')">
                        <button type="button" ng-disabled="modalCheckOut.isSaving" ng-click="modalCheckOut.nextStep()" class="btn btn-blue btn-lg pull-left">
                          <i class="fa fa-spinner fa-spin ng-hide" ng-show="modalCheckOut.isSaving"></i>
                          ข้ามขั้นตอนนี้ <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </button>
                        <button type="button" ng-disabled="modalCheckOut.isSaving" ng-click="payCheckOutReceipt(modalCheckOut)" class="btn btn-green btn-lg pull-right">
                          <i class="fa fa-spinner fa-spin ng-hide" ng-show="modalCheckOut.isSaving"></i>
                          <i class="fa fa-money" aria-hidden="true"></i> ชำระเงิน
                        </button>
                      </div><!---->
                      <!---->
                      <!---->
                    </div>
                  </div>
                </div>
              </div><!---->
            </section>
            <section ng-show="modalCheckOut.step >= 3" class="ng-hide">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <div class="alert alert-warning" role="alert">
                    <span class="label label-warning">STEP 3</span>
                     <b>กรอกรายการคืนเงินประกัน</b> หากมีการคืนเงิน (เช่น เงินประกันห้อง, เงินประกันคีย์การ์ด) กรุณากรอกข้อมูลลงในขั้นตอนนี้
                  </div>
                  <h4><b><i class="fa fa-money" aria-hidden="true"></i> คืนเงินประกัน</b></h4>
                  <div class="col-xs-12 col-md-9 col-md-offset-2">
                    <h5><b>รายการคืนเงิน</b></h5>
                    <table class="table table-bordered">
                      <tbody><tr>
                        <th width="60%">รายการ</th>
                        <th>จำนวนเงิน(บาท)</th>
                      </tr>
                      <tr>
                        <td>คืนเงินประกัน</td>
                        <td><input class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" valid-number="" type="text" ng-model="modalCheckOut.insuranceCost"></td>
                      </tr>
                      <!---->
                      <tr>
                        <th>รวมรายการคืน</th>
                        <th>
                          <b>0</b>
                        </th>
                      </tr>
                    </tbody></table>
                    <div class="col-xs-12" style="margin-bottom:10px">
                      <button style="margin-left:5px" class="btn btn-orange btn-sm pull-right" ng-click="addRefundCheckout()">
                        <i class="fa fa-plus"></i> เพิ่มรายการคืนเงิน
                      </button>
                    </div>
                    <!-- Sticker -->
                    <!---->
                    <!-- End -->
                    <div class="col-xs-12" style="padding:30px">
                      <h3 class="text-center"><strong>สรุปการย้ายออก</strong></h3>
                      <ul class="list-group">
                        <!---->
                        <!---->
                        <!---->
                        <!---->
                        <li class="list-group-item clearfix">
                          <!----><h3 class="text-red text-center" ng-if="getTotalCheckOutCost(modalCheckOut) <= 0">
                            <i class="fa fa-money" aria-hidden="true"></i> <strong>คืนเงินผู้เช่า 0 บาท</strong>
                          </h3><!---->
                          <!---->
                        </li>
                      </ul>
                      <div class="col-xs-12 text-center">
                        <div class="form-inline">
                          <div class="form-group">
                            <label>วันที่ย้ายออก</label>
                            <input type="text" datepicker="" ng-model="modalCheckOut.cancelledDate" class="form-control ng-pristine ng-untouched ng-valid ng-not-empty" placeholder="กรุณากรอกวันที่ย้ายออก">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12">
                      <div class="alert alert-success text-center" role="alert">
                         เมื่อเสร็จสิ้นขั้นตอนทุกอย่าง และ ตรวจสอบข้อมูลถูกต้อง สามารถคลิกปุ่ม <b><i class="fa fa-sign-out" aria-hidden="true"></i> ย้ายออก</b> ได้เลย !
                      </div>
                      <div class="col-xs-12 text-center">
                        <span class="text-red"><b>คำเตือน</b> กรุณา<u>ตรวจสอบบิลค้างชำระ</u> และ <u>ยืนยันการชำระเงินทั้งหมด</u> ก่อนคลิกปุ่มย้ายออก</span>
                      </div>
                    </div>
                    <div class="col-xs-12" style="margin-top:15px">
                      <div class="btn-group dropup">
                        <button type="button" class="btn btn-blue btn-lg dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <i class="fa fa-print"></i> พิมพ์ใบย้ายออก <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a href="#" ng-click="printCheckOutSummary(modalCheckOut,false)">แบบมีสรุปยอดเงิน</a></li>
                          <li><a href="#" ng-click="printCheckOutSummary(modalCheckOut,true)">แบบไม่มีสรุปยอดเงิน</a></li>
                        </ul>
                      </div>
                      <button type="button" ng-disabled="modalCheckOut.isSaving" ng-click="checkOut()" class="btn btn-red btn-lg pull-right">
                        <i class="fa fa-sign-out" aria-hidden="true"></i> ย้ายออก
                        <i class="fa fa-spinner fa-spin ng-hide" ng-show="modalCheckOut.isSaving"></i>
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </section>
          </div><!---->
        </div>
      </div>
    </div>


    <!-- Booking content -->
    <div role="tabpanel" class="tab-pane active" id="booking">
      <!----><div ng-include="'views/rooms-tab/booking-tab.html'"><div class="container">
  <div class="col-xs-12" style="margin-bottom:15px">
    <h4>
      <b><i class="fa fa-calendar" aria-hidden="true"></i> รายการจองห้อง</b>
      <div class="btn-group pull-right">
        <button type="button" class="btn btn-blue dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fa fa-plus"></i> เพิ่มการจอง <span class="caret"></span>
        </button>
        <ul class="dropdown-menu">
          <li><a href="#" ng-click="addBooking('monthly')">รายเดือน</a></li>
          <li><a href="#" ng-click="addBooking('daily')">รายวัน</a></li>
        </ul>
      </div>
    </h4>
  </div>
  <div class="col-xs-12" ng-show="!modalLoadingRoomData.booking">
    <div class="list-group">
      <!----><div class="list-group-item" ng-if="modalBookData.bookings &amp;&amp; modalBookData.bookings.length == 0">
        <h4 class="list-group-item-heading text-center">ไม่มีข้อมูลการจอง</h4>
      </div><!---->
      <!---->
    </div>
  </div>
  <div class="col-xs-12 text-center ng-hide" ng-show="modalLoadingRoomData.booking">
    <i class="fa fa-spinner fa-spin fa-2x"></i>
  </div>
</div>
</div>
    </div>

    <!-- Digital Meter -->
    <div role="tabpanel" class="tab-pane" id="digitalmeter">
      <!----><div ng-include="'views/rooms-tab/digitalmeter-tab.html'"><div class="container">
  <div class="row">
    <div class="col-xs-12 col-lg-6 col-lg-offset-3" style="margin-top:15px;">
      <!---->
      <!----><div ng-if="!digitalMeterData" class="row text-center">
        <i class="fa fa-spinner fa-spin"></i> กำลังโหลดข้อมูล....
      </div><!---->

    </div>
  </div>

</div>
</div>
    </div>

    <!-- Apartment Repport -->
    <div role="tabpanel" class="tab-pane" id="report">
      <!----><div ng-include="'views/rooms-tab/report-tab.html'"><div class="container">
  <div class="row">
    <h4 class="clearfix">
      <img src="images/icon/feed/speaker.png" width="20px" alt="speaker" style="vertical-align: top;">
      <strong>รายการแจ้งที่ยังไม่เสร็จสิ้น</strong>
      <div class="dropdown pull-right">
        <button class="btn btn-blue dropdown-toggle" type="button" data-toggle="dropdown">
        <i class="fa fa-plus"></i> เพิ่มรายการ
        <span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a ng-click="showApartmentrReportCreateModal(null, apartment, modalReportData.room,'fix')">แจ้งซ่อม</a></li>
          <li><a ng-click="showApartmentrReportCreateModal(null, apartment, modalReportData.room,'cleaning')">แจ้งทำความสะอาด</a></li>
          <li><a ng-click="showApartmentrReportCreateModal(null, apartment, modalReportData.room,'moveout')">แจ้งย้ายออก</a></li>
        </ul>
      </div>
    </h4>
    <div class="well clearfix">
      <!----><div ng-if="modalReportData &amp;&amp; modalReportData.reports">
        <!---->
      </div><!---->
      <!---->
      <!----><div class="col-xs-12 text-center" ng-if="modalReportData.reports.length == 0">
        ไม่มีรายการ
      </div><!---->
    </div>
  </div>
</div>
</div>
    </div>
  </div>
</div><!-- /.modal-body -->
</div><!-- /.modal-content -->
</div>