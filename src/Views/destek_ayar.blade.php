@extends('acr_destek.index')
@section('acr_destek')
    <section class="content">
        <?php

        echo empty($msg) ? '' : $msg; ?>
        <div class="row">
        <?php echo $destek->menu($tab);
        $ayar = $destek_model->destek_ayar();
        if (empty($ayar)) {
            $destek_mail       = '';
            $sms_user          = '';
            $sms_sifre         = '';
            $sms_baslik        = '';
            $destek_admin_isim = '';
            $sms_aktiflik      = '';
            $user_name_stun    = '';
            $user_id_stun      = '';
            $user_email_stun   = '';
        } else {
            $destek_mail       = $ayar->destek_mail;
            $sms_user          = $ayar->sms_user;
            $sms_sifre         = $ayar->sms_sifre;
            $sms_baslik        = $ayar->sms_baslik;
            $destek_admin_isim = $ayar->destek_admin_isim;
            $sms_aktiflik      = $ayar->sms_aktiflik;
            $user_name_stun    = $ayar->user_name_stun;
            $user_id_stun      = $ayar->user_id_stun;
            $user_email_stun   = $ayar->user_email_stun;
        }
        if ($destek_model->uye_id() == 1) {
        ?>

        <!-- /.col -->
            <form action="/acr/des/ayar/kaydet" method="post" enctype="multipart/form-data">
                <?php echo csrf_field() ?>
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Destek Ayarları Yapılandırma - Admin</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="form-group">
                                <input name="destek_mail" id="destek_mail" class="form-control" placeholder="Kullanıcıların cevap vereceği Mail adresi " value="<?php echo $destek_mail ?>">
                            </div>
                            <div class="form-group">
                                <input name="sms_user" id="sms_user" class="form-control" placeholder="Sms Kullanıcı" value="<?php echo $sms_user ?>">
                            </div>
                            <div class="form-group">
                                <input type="password" name="sms_sifre" id="sms_sifre" class="form-control" placeholder="Sms Şifre" value="<?php echo $sms_sifre?>">
                            </div>
                            <div class="form-group">
                                <input name="sms_baslik" id="sms_baslik" class="form-control" placeholder="SMS BAŞLIK" value="<?php echo $sms_baslik?>">
                            </div>
                            <div class="form-group">
                                <input name="destek_admin_isim" id="destek_admin_isim" class="form-control" placeholder="Gönderen" value="<?php echo $destek_admin_isim ?>">
                            </div>
                            <div class="form-group">
                                <input name="user_name_stun" id="user_name_stun" class="form-control" placeholder="Database user tablo ismi" value="<?php echo $user_name_stun ?>">
                            </div>
                            <div class="form-group">
                                <input name="user_id_stun" id="user_id_stun" class="form-control" placeholder="Database user tablo ID'si" value="<?php echo $user_id_stun ?>">
                            </div>
                            <div class="form-group">
                                <input name="user_email_stun" id="user_email_stun" class="form-control" placeholder="Database user tablo email ismi" value="<?php echo $user_email_stun ?>">
                            </div>

                            <div class="form-group">
                                <input name="remote" id="remote" class="form-control" placeholder="Destek Programı (Alpemix)" value="<?php echo $ayar->remote ?>">
                            </div>

                            <div class="form-group">
                                <input <?php echo $sms_aktiflik == 1 ? 'checked="checked"' : '';?> name="sms_aktiflik" id="sms_aktiflik" type="checkbox" value="1"/> <label for="sms_aktiflik">SMS Gönderimi
                                    Aktif</label>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Gönder</button>
                            </div>
                            <a href="/destek" type="reset" class="btn btn-default"><i class="fa fa-times"></i> Vazgeç</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /. box -->
                </div>
            </form>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <?php } ?>
@stop