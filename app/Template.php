<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public static function Bulletin($analyse)
    {
        $path=asset('img/background1.jpg');
        $html='
            <html>
            <head><meta http-equiv=Content-Type content="text/html; charset=UTF-8">
            <style type="text/css">
            <!--
            span.cls_002{font-family:"Calibri Bold",serif;font-size:14.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_002{font-family:"Calibri Bold",serif;font-size:14.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_003{font-family:"Calibri Bold",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_003{font-family:"Calibri Bold",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_004{font-family:"Calibri",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
            div.cls_004{font-family:"Calibri",serif;font-size:11.0px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
            span.cls_019{font-family:Times,serif;font-size:20.0px;color:rgb(0,0,0);font-weight:bold;font-style:italic;text-decoration: underline}
            div.cls_019{font-family:Times,serif;font-size:20.0px;color:rgb(0,0,0);font-weight:bold;font-style:italic;text-decoration: none}
            span.cls_006{font-family:Arial,serif;font-size:11.6px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_006{font-family:Arial,serif;font-size:11.6px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_007{font-family:Arial,serif;font-size:11.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_007{font-family:Arial,serif;font-size:11.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_008{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_008{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_009{font-family:Arial,serif;font-size:10.6px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_009{font-family:Arial,serif;font-size:10.6px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_010{font-family:Arial,serif;font-size:12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_010{font-family:Arial,serif;font-size:12.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_011{font-family:Arial,serif;font-size:9.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            div.cls_011{font-family:Arial,serif;font-size:9.5px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_020{font-family:Times,serif;font-size:14.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: underline}
            div.cls_020{font-family:Times,serif;font-size:14.0px;color:rgb(0,0,0);font-weight:bold;font-style:normal;text-decoration: none}
            span.cls_015{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
            div.cls_015{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
            span.cls_016{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
            div.cls_016{font-family:Arial,serif;font-size:12.1px;color:rgb(0,0,0);font-weight:normal;font-style:normal;text-decoration: none}
            -->
            </style>
            <script type="text/javascript" src="d5960adc-7dfb-11eb-8b25-0cc47a792c0a_id_d5960adc-7dfb-11eb-8b25-0cc47a792c0a_files/wz_jsgraphics.js"></script>
            </head>
            <body>
            <div style="position:absolute;left:50%;margin-left:-297px;top:0px;width:595px;height:841px;overflow:hidden">
            <div style="position:absolute;left:0px;top:0px">
            </div>
            <div style="position:absolute;left:101.10px;top:33.82px" class="cls_002"><span class="cls_002">LABORATOIRE DE CÔNTRLE DE QUALITÉ & DE CONFORMITÉ</span></div>
            <div style="position:absolute;left:191.96px;top:51.10px" class="cls_003"><span class="cls_003">Tél/Fax : </span><span class="cls_004">025 23 81 02 / Mobile : 0541 48 54 77</span></div>
            <div style="position:absolute;left:249.70px;top:64.48px" class="cls_003"><span class="cls_003">Email : </span>contact@altesselab.com</span></div>
            <div style="position:absolute;left:186.38px;top:77.92px" class="cls_003"><span class="cls_003">Adresse : </span><span class="cls_004">Rue Zabana en Face l’hôpital Frantz Fanon - BLIDA</span></div>
            <div style="position:absolute;left:440.28px;top:113.86px" class="cls_004"><span class="cls_004">Blida le :'.date('Y-m-d').'</span></div>
            <div style="position:absolute;left:150.56px;top:135.54px" class="cls_019"><span class="cls_019">Bulletin d’analyse :'.$analyse->analyse.'</span></div>
            <div style="position:absolute;left:30.00px;top:201.78px" class="cls_006"><span class="cls_006">Numéro dinscription </span><span class="cls_007">au </span><span class="cls_008">laboratoire :</span></div>
            <div style="position:absolute;left:30.00px;top:224.64px" class="cls_008"><span class="cls_008">Client </span><span class="cls_009">: '.$analyse->getClient()['nom'].'</span></div>
            <div style="position:absolute;left:30.00px;top:247.56px" class="cls_006"><span class="cls_006">Adresse :</span></div>
            <div style="position:absolute;left:30.00px;top:269.82px" class="cls_006"><span class="cls_006">Nature </span><span class="cls_009">de </span><span class="cls_010">produit </span><span class="cls_011">:</span></div>
            <div style="position:absolute;left:30.00px;top:293.34px" class="cls_006"><span class="cls_006">Quantité </span><span class="cls_008">:</span></div>
            <div style="position:absolute;left:325.90px;top:293.82px" class="cls_006"><span class="cls_006">Volume </span><span class="cls_007">:</span></div>
            <div style="position:absolute;left:30.00px;top:316.20px" class="cls_007"><span class="cls_007">Date </span><span class="cls_009">de </span><span class="cls_008">fabrication </span><span class="cls_010">:</span></div>
            <div style="position:absolute;left:325.36px;top:316.20px" class="cls_007"><span class="cls_007">Date </span><span class="cls_009">de </span><span class="cls_006">péremption </span><span class="cls_010">:</span></div>
            <div style="position:absolute;left:30.00px;top:339.72px" class="cls_008"><span class="cls_008">Lot </span><span class="cls_007">:</span></div>
            <div style="position:absolute;left:72.00px;top:362.64px" class="cls_010"><span class="cls_010">Echantillon :</span></div>
            <div style="position:absolute;left:72.00px;top:384.72px" class="cls_007"><span class="cls_007">Analysé le </span><span class="cls_011">:</span></div>
            <div style="position:absolute;left:72.00px;top:532.78px" class="cls_020"><span class="cls_020">Examen préliminaire :</span></div>
            <div style="position:absolute;left:90.02px;top:559.18px" class="cls_015"><span class="cls_015">•</span><span class="cls_016"> </span><span class="cls_008">  Aspect et couleur :</span></div>
            <div style="position:absolute;left:90.02px;top:579.90px" class="cls_015"><span class="cls_015">•</span><span class="cls_016"> </span><span class="cls_008">  Goût et odeur :</span></div>
            <div style="position:absolute;left:90.02px;top:600.50px" class="cls_015"><span class="cls_015">•</span><span class="cls_016"> </span><span class="cls_008">  Examen macroscopique :</span></div>
            </div>
        
            </body>
            </html>        
        ';
        return $html;

    }
    /**
     * 
     */
    public static function Facture($facture)
    {
        $items = Item::where('facture',$facture->id)->get();

        $html='
        <!doctype html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <title>Facture</title>
        
        <style type="text/css">
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }
        
            .gray {
                background-color: lightgray
            }
        </style>
        
        </head>
        <body>
        
          <table width="100%">
            <tr>
                <td valign="top"><img src="" alt="" width="150"/></td>
                <td align="right">
                    <h3>Laboratoire des analyses</h3>
                    <pre>
                        Company representative name
                        Company address
                        Tax ID
                        phone
                        fax
                    </pre>
                </td>

            </tr>
        
          </table>
        
          <table width="100%">
            <tr>
                <td><strong>Client:</strong>  </td>
            </tr>
        
          </table>
        
          <br/>
        
          <table width="100%">
            <thead style="background-color: lightgray;">
              <tr>
                <th>#</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Pix </th>
                <th>Total </th>
              </tr>
            </thead>
            <tbody>
            ';
            foreach($items as $item){
                $html = $html .'
                    <tr>
                        <th scope="row">'.$item->id.'</th>
                        <td>'.$item->designation.'</td>
                        <td align="center">'.$item->quantite.'</td>
                        <td align="center">'.$item->prix.'</td>
                        <td align="center">'.$item->prix*$item->quantite.'</td>
                    </tr>                
                ';
            }

            $tva =$facture->total * 0.19;
            $ttc = $tva +$facture->total;
            $html= $html .'
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3"></td>
                    <td align="center">Total </td>
                    <td align="center">'.$facture->total.'</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="center">TVA</td>
                    <td align="center">'.$tva.'</td>
                </tr>
                <tr>
                    <td colspan="3"></td>
                    <td align="center">Total TTc </td>
                    <td align="center" class="gray">'.$ttc.'</td>
                </tr>
            </tfoot>
          </table>
        
        </body>
        </html>        
        
        ';

        return $html;

    }




}
