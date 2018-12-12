<tr id="destek_satir_' . $item->destek_users_id . '">
    <td><input id="destek_id[]" name="destek_id[]" value="' . $item->destek_users_id . '" type="checkbox"></td>
    <td class="mailbox-name"><a {!! $okunduStyle !!} href="/acr/des/mesaj_oku?mesaj_id={{$item->destek_users_id}}&tab={{$tab}}">{{$name}}</a></td>
    <td class="mailbox-subject">{{$konu}}</td>
    <td class="mailbox-attachment"></td>
    <td align="right" class="mailbox-date">{{date('d/m/Y H:i', strtotime($item->d_cd))}}</td>
</tr>