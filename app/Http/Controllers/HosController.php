<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\User;
use App\Drugitems;
use App\Opitemrece;
use App\Clinic_drug;
use Image;
use PDF;
use Auth;
use Validator;
use App\Person;
use App\Hdc_nhso;
use App\Pttype;
use SoapClient;



class HosController extends Controller
{
    public function dashboard_hos(Request $request)
    {
        $per_co1 = Person::where('house_regist_type_id','=','1')->count();
        $per_co2 = Person::where('house_regist_type_id','=','2')->count();
        $per_co3 = Person::where('house_regist_type_id','=','3')->count();
        $per_co4 = Person::where('house_regist_type_id','=','4')->count();

        $per_00 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','00')->count();
        $per_02 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','02')->count();
        $per_09 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','09')->count();
        $per_25 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','25')->count();
        $per_26 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','26')->count();
        $per_27 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','27')->count();
        $per_28 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','28')->count();
        $per_29 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','29')->count();
        $per_45 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','45')->count();
        $per_46 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','46')->count();
        $per_47 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','47')->count();
        $per_71 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','71')->count();
        $per_72 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','72')->count();
        $per_73 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','73')->count();
        $per_74 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','74')->count();
        $per_75 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','75')->count();
        $per_76 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','76')->count();
        $per_77 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','77')->count();
        $per_78 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','78')->count();
        $per_79 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','79')->count();
        $per_80 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','80')->count();
        $per_81 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','81')->count();
        $per_82 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','82')->count();
        $per_87 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','87')->count();
        $per_88 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','88')->count();
        $per_89 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','89')->count();
        $per_90 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','90')->count();
        $per_L0 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L0')->count();
        $per_L1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L1')->count();
        $per_L2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L2')->count();
        $per_L3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L3')->count();
        $per_L4 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L4')->count();
        $per_L5 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L5')->count();
        $per_L6 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L6')->count();
        $per_L9 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','L9')->count();
        $per_ND = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','ND')->count();
        $per_nu = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','nu')->count();
        $per_NV = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','NV')->count();
        $per_O1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O1')->count();
        $per_O2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O2')->count();
        $per_O3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O3')->count();
        $per_O4 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O4')->count();
        $per_O5 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','O5')->count();
        $per_P1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','P1')->count();
        $per_P2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','P2')->count();
        $per_P3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','P3')->count();
        $per_S1 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S1')->count();
        $per_S2 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S2')->count();
        $per_S3 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S3')->count();
        $per_S6 = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','S6')->count();
        $per_ST = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','ST')->count();
        $per_VD = DB::connection('mysql2')->table('person')->leftJoin('pttype','person.pttype','=','pttype.pttype')->where('person.pttype','=','VD')->count();

        $per_moo_0 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','1')->where('death','=','N')->count();
        $per_moo_1 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','2')->where('death','=','N')->count();
        $per_moo_2 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','3')->where('death','=','N')->count();
        $per_moo_3 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','4')->where('death','=','N')->count();
        $per_moo_4 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','5')->where('death','=','N')->count();
        $per_moo_5 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','6')->where('death','=','N')->count();
        $per_moo_6 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','7')->where('death','=','N')->count();
        $per_moo_7 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','8')->where('death','=','N')->count();
        $per_moo_8 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','9')->where('death','=','N')->count();
        $per_moo_9 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','10')->where('death','=','N')->count();
        $per_moo_10 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','11')->where('death','=','N')->count();
        $per_moo_11 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','12')->where('death','=','N')->count();
        $per_moo_12 = DB::connection('mysql2')->table('person')->leftJoin('village','person.village_id','=','village.village_id')
        ->where('person.village_id','=','13')->where('death','=','N')->count();

        $per_anc1 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2015-10-1', '2016-09-30'])->count();
        $per_anc2 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2016-10-1', '2017-09-30'])->count();
        $per_anc3 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2017-10-1', '2018-09-30'])->count();
        $per_anc4 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2018-10-1', '2019-09-30'])->count();
        $per_anc5 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2019-10-1', '2020-09-30'])->count();
        $per_anc6 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2020-10-1', '2021-09-30'])->count();
        $per_anc7 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2021-10-1', '2022-09-30'])->count();
        $per_anc8 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2022-10-1', '2023-09-30'])->count();
        $per_anc9 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2023-10-1', '2024-09-30'])->count();
        $per_anc10 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2024-10-1', '2025-09-30'])->count();
        $per_anc11 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2025-10-1', '2026-09-30'])->count();
        $per_anc12 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2026-10-1', '2027-09-30'])->count();
        $per_anc13 = DB::connection('mysql2')->table('person')->leftJoin('person_anc','person.person_id','=','person_anc.person_id')
        ->where('death','=','N')->where('house_regist_type_id' ,'=', ['1','3'])->whereBetween('anc_register_date', ['2027-10-1', '2028-09-30'])->count();

        //==================================================================DM=================================================================================//

        $per_dm01 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2007-10-1', '2008-09-30'])->count();
        $per_dm02 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2008-10-1', '2009-09-30'])->count();
        $per_dm03 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2009-10-1', '2010-09-30'])->count();
        $per_dm04 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2010-10-1', '2011-09-30'])->count();
        $per_dm05 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2011-10-1', '2012-09-30'])->count();
        $per_dm06 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2012-10-1', '2013-09-30'])->count();
        $per_dm07 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2013-10-1', '2014-09-30'])->count();
        $per_dm08 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2014-10-1', '2015-09-30'])->count();

        $per_dm1 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2015-10-1', '2016-09-30'])->count();
        $per_dm2 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2016-10-1', '2017-09-30'])->count();
        $per_dm3 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2017-10-1', '2018-09-30'])->count();
        $per_dm4 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2018-10-1', '2019-09-30'])->count();
        $per_dm5 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2019-10-1', '2020-09-30'])->count();
        $per_dm6 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2020-10-1', '2021-09-30'])->count();
        $per_dm7 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2021-10-1', '2022-09-30'])->count();
        $per_dm8 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2022-10-1', '2023-09-30'])->count();
        $per_dm9 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2023-10-1', '2024-09-30'])->count();
        $per_dm10 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2024-10-1', '2025-09-30'])->count();
        $per_dm11 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2025-10-1', '2026-09-30'])->count();
        $per_dm12 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2026-10-1', '2027-09-30'])->count();
        $per_dm13 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','001')->whereBetween('regdate', ['2027-10-1', '2028-09-30'])->count();

        //==================================================================HT=================================================================================//
        $per_ht1 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2007-10-1', '2008-09-30'])->count();
        $per_ht2 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2008-10-1', '2009-09-30'])->count();
        $per_ht3 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2009-10-1', '2010-09-30'])->count();
        $per_ht4 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2010-10-1', '2011-09-30'])->count();
        $per_ht5 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2011-10-1', '2012-09-30'])->count();
        $per_ht6 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2012-10-1', '2013-09-30'])->count();
        $per_ht7 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2013-10-1', '2014-09-30'])->count();
        $per_ht8 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2014-10-1', '2015-09-30'])->count();
        $per_ht9 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2015-10-1', '2016-09-30'])->count();
        $per_ht10 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2016-10-1', '2017-09-30'])->count();
        $per_ht11 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2017-10-1', '2018-09-30'])->count();
        $per_ht12 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2018-10-1', '2019-09-30'])->count();
        $per_ht13 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2019-10-1', '2020-09-30'])->count();
        $per_ht14 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2020-10-1', '2021-09-30'])->count();
        $per_ht15 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2021-10-1', '2022-09-30'])->count();
        $per_ht16 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2022-10-1', '2023-09-30'])->count();
        $per_ht17 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2023-10-1', '2024-09-30'])->count();
        $per_ht18 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2024-10-1', '2025-09-30'])->count();
        $per_ht19 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2025-10-1', '2026-09-30'])->count();
        $per_ht20 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2026-10-1', '2027-09-30'])->count();
    $per_ht21 = DB::connection('mysql2')->table('person')->leftJoin('clinicmember','person.patient_hn','=','clinicmember.hn')
        ->where('death','=','N')->where('clinicmember.clinic','=','002')->whereBetween('regdate', ['2027-10-1', '2028-09-30'])->count();

        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();

        return view('dashboard_hos',[
            'data_hos'=>$data_hos,
            'per_ht1'=>$per_ht1,'per_ht2'=>$per_ht2,'per_ht3'=>$per_ht3,'per_ht4'=>$per_ht4,'per_ht5'=>$per_ht5,'per_ht6'=>$per_ht6,'per_ht7'=>$per_ht7,'per_ht8'=>$per_ht8,
            'per_ht9'=>$per_ht9,'per_ht10'=>$per_ht10,'per_ht11'=>$per_ht11,'per_ht12'=>$per_ht12,'per_ht13'=>$per_ht13,'per_ht14'=>$per_ht14,'per_ht15'=>$per_ht15,'per_ht16'=>$per_ht16,
            'per_ht17'=>$per_ht17,'per_ht18'=>$per_ht18,'per_ht19'=>$per_ht19,'per_ht20'=>$per_ht20,'per_ht21'=>$per_ht21,

            'per_dm1'=>$per_dm1,'per_dm2'=>$per_dm2,'per_dm3'=>$per_dm3,'per_dm4'=>$per_dm4,'per_dm5'=>$per_dm5,'per_dm6'=>$per_dm6,'per_dm7'=>$per_dm7,'per_dm8'=>$per_dm8,
            'per_dm9'=>$per_dm9,'per_dm10'=>$per_dm10,'per_dm11'=>$per_dm11,'per_dm12'=>$per_dm12,'per_dm13'=>$per_dm13,
            'per_dm01'=>$per_dm01,'per_dm02'=>$per_dm02,'per_dm03'=>$per_dm03,'per_dm04'=>$per_dm04,
            'per_dm05'=>$per_dm05,'per_dm06'=>$per_dm06,'per_dm07'=>$per_dm07,'per_dm08'=>$per_dm08,
            'per_anc1'=>$per_anc1, 'per_anc2'=>$per_anc2, 'per_anc3'=>$per_anc3, 'per_anc4'=>$per_anc4, 'per_anc5'=>$per_anc5, 'per_anc6'=>$per_anc6, 'per_anc7'=>$per_anc7,
            'per_anc8'=>$per_anc8, 'per_anc9'=>$per_anc9, 'per_anc10'=>$per_anc10, 'per_anc11'=>$per_anc11, 'per_anc12'=>$per_anc12, 'per_anc13'=>$per_anc13,
            'per_moo_0'=>$per_moo_0, 'per_moo_1'=>$per_moo_1, 'per_moo_2'=>$per_moo_2, 'per_moo_3'=>$per_moo_3, 'per_moo_4'=>$per_moo_4,
            'per_moo_5'=>$per_moo_5, 'per_moo_6'=>$per_moo_6, 'per_moo_7'=>$per_moo_7, 'per_moo_8'=>$per_moo_8, 'per_moo_9'=>$per_moo_9,
            'per_moo_10'=>$per_moo_10, 'per_moo_11'=>$per_moo_11, 'per_moo_12'=>$per_moo_12,
            'per_co1'=>$per_co1, 'per_co2'=>$per_co2, 'per_co3'=>$per_co3, 'per_co4'=>$per_co4,
            'per_00'=>$per_00,'per_02'=>$per_02,'per_09'=>$per_09,'per_25'=>$per_25,'per_26'=>$per_26,'per_27'=>$per_27,'per_28'=>$per_28,
            'per_29'=>$per_29,'per_45'=>$per_45,'per_46'=>$per_46,'per_47'=>$per_47,'per_71'=>$per_71,'per_72'=>$per_72,'per_73'=>$per_73,'per_74'=>$per_74,'per_75'=>$per_75,'per_76'=>$per_76,
            'per_77'=>$per_77,'per_78'=>$per_78,'per_79'=>$per_79,'per_80'=>$per_80,'per_81'=>$per_81,'per_82'=>$per_82,'per_87'=>$per_87,'per_88'=>$per_88,'per_89'=>$per_89,'per_90'=>$per_90,
            'per_L0'=>$per_L0,'per_L1'=>$per_L1,'per_L2'=>$per_L2,'per_L3'=>$per_L3,'per_90'=>$per_90,'per_82'=>$per_82,'per_87'=>$per_87,'per_88'=>$per_88,'per_89'=>$per_89,'per_L4'=>$per_L4,
            'per_L5'=>$per_L5,'per_L6'=>$per_L6,'per_L9'=>$per_L9,'per_ND'=>$per_ND,'per_nu'=>$per_nu,'per_NV'=>$per_NV,'per_O1'=>$per_O1,'per_O2'=>$per_O2,'per_O3'=>$per_O3,'per_O4'=>$per_O4,
            'per_O5'=>$per_O5,'per_P1'=>$per_P1,'per_P2'=>$per_P2,'per_P3'=>$per_P3,'per_S1'=>$per_S1,'per_S2'=>$per_S2,'per_S3'=>$per_S3,'per_S6'=>$per_S6,'per_ST'=>$per_ST,'per_VD'=>$per_VD,
            ]);
    }

    public function sss(Request $request)
    {
        $item = DB::connection('mysql2')->table('person')->leftjoin('hdc_nhso','person.cid','=','hdc_nhso.Person_ID')->where('death','=','N')->get();
        $Pttype = Pttype::get();
        $tumbon = DB::table('clinic_locate')->get();
        $Hm = DB::table('clinic_hmain')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.sss',[
            'data_hos'=>$data_hos,
            'items'=>$item,
            'Pttypes' => $Pttype,
            'tumbons' => $tumbon,
            'Hms' => $Hm
        ]);

    }
    public function hdc(Request $request)
    {
        $per = Person::where('death','=','N')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.hdc',[
            'data_hos'=>$data_hos,
            'pers'=>$per
        ]);

    }
    public function api_hdc(Request $request)
    {
        $per = Person::where('death','=','N')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
         return response()->json([
            'data_hos'=>$data_hos,
            'status'=>true,
            'response'=>$per,
            'message'=>'All person'
        ], 200);
    }
    public static function sumdrug_hos_qty($icode)
    {
        //  $sumrecieve  =  Clinic_recieve_store::where('STORE_RECIEVE_DRUG_ID','=',$id)->sum('STORE_RECIEVE_DRUG_QTY');
        //  $sumpay  =  Clinic_pay_store::where('PAYDETAIL_DRUG_ID','=',$id)->sum('PAYDETAIL_DRUG_QTY');
         $sumdrug_opitem  =  Opitemrece::where('icode','=',$icode)->sum('qty');

         $totalvalue =   $sumdrug_opitem ;

       return $totalvalue ;
    }

    public function drug_hos(Request $request,$idstore,$iduser)
    {
      
        $locate_a = DB::table('clinic_locate')->count();
        $category_a = DB::table('clinic_category')->count();
        $unit_a = DB::table('clinic_unit')->count();
        $supplier_a = DB::table('clinic_supplier')->count();
        $sym_a = DB::table('clinic_sym')->count();
        $per_a = DB::table('clinic_per')->count();
        $product_a = DB::table('clinic_drug')->where('DRUG_STORE','=',$idstore)->count();
        $recieve_a = DB::table('clinic_recieve')->where('REC_LOCATE','=',$idstore)->count();
        $pay_a = DB::table('clinic_pay')->where('PAY_STORE_STAFF','=',$idstore)->count();
        $user_a = DB::table('users')->where('store_id','=',$idstore)->count();
        $order_a = DB::table('clinic_orders')->where('ORDER_STORE','=',$idstore)->count();

        $drug_hos = Drugitems::where('istatus','=','Y')->get();
        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        
        $pml =  DB::table('users')->where('id','=',$iduser)->first();
        $permiss =  DB::table('permiss_list')->leftjoin('users','permiss_list.PERMISS_LIST_USER','=','users.id')->where('permiss_list.PERMISS_LIST_USER','=',$iduser)->get();
        $permiss_u =  DB::table('users')->where('id','=',$iduser)->get();
        return view('hos.drug_hos',[
            'data_hos'=>$data_hos, 'permiss'=>$permiss,'permiss_u'=>$permiss_u,
            'product_a' => $product_a,'locate_a' => $locate_a,'category_a' => $category_a,'unit_a' => $unit_a,'supplier_a' => $supplier_a,
            'sym_a' => $sym_a,'recieve_a' => $recieve_a,'pay_a' => $pay_a,'per_a' => $per_a,'user_a' => $user_a,'order_a'=>$order_a,
            'drug_hoss' => $drug_hos,

        ]);
    }

    public function drug_hos_save(Request $request)
    {
        $idstore = $request->idstore;
        $iduser = $request->iduser;

        if($request->store_id != '' || $request->store_id != null){
       
        $store_id = $request->store_id;
        $d_icode = $request->icode;
        $d_name = $request->name;
        $d_strength = $request->strength;
        $d_units = $request->units;
        $d_unitprice = $request->unitprice;
        $d_unitcost = $request->unitcost;
        $d_did = $request->did;
        $d_istatus = $request->istatus;
        $d_therapeutic = $request->therapeutic;
        $d_qty = $request->qty;
        
        $number =count($store_id);
        $count = 0;
        for($count = 0; $count< $number; $count++)
        {
            $add= new Clinic_drug();
            $add->DRUG_CODE = $d_icode[$count];
            $add->DRUG_NAME = $d_name[$count];

            if($d_units[$count] == 'TABLET'){
                $add->DRUG_UNIT = 1;
           }elseif($d_units[$count] == 'เม็ด'){
                $add->DRUG_UNIT = 2;
           }elseif($d_units[$count] == 'CAPSULE'){
                $add->DRUG_UNIT = 3;
           }elseif($d_units[$count] == 'TAB'){
                $add->DRUG_UNIT = 4;
            }elseif($d_units[$count] == 'ขวด (10 ML.)'){
                $add->DRUG_UNIT = 5;
            }elseif($d_units[$count] == 'ขวด (60 ML.)'){
                $add->DRUG_UNIT = 6;
            }elseif($d_units[$count] == 'ขวด (120 ML.)'){
                $add->DRUG_UNIT = 7;
            }elseif($d_units[$count] == 'ขวด (180 ML)'){
                $add->DRUG_UNIT = 8;
            }elseif($d_units[$count] == 'ขวด (240 ML)'){
                $add->DRUG_UNIT = 9;
            }elseif($d_units[$count] == 'AMP (1 ml.)'){
                $add->DRUG_UNIT = 10;
            }elseif($d_units[$count] == 'หลอด (15 G.)'){
                $add->DRUG_UNIT = 11;
            }elseif($d_units[$count] == 'ขวด (450 ML.)'){
                $add->DRUG_UNIT = 12;
            }elseif($d_units[$count] == 'BAG (500 ML.)'){
                $add->DRUG_UNIT = 13;
            }elseif($d_units[$count] == 'BAG (1000 ML.)'){
                $add->DRUG_UNIT = 14;
            }elseif($d_units[$count] == 'AMP (2 ml.)'){
                $DRUG_UNIT = 15;
            }elseif($d_units[$count] == 'AMP (3 ML.)'){
                $add->DRUG_UNIT = 16;
            }elseif($d_units[$count] == 'หลอด (30 G.)'){
                $add->DRUG_UNIT = 17;
            }elseif($d_units[$count] == 'หลอด (45 G.)'){
                $add->DRUG_UNIT = 18;
            }elseif($d_units[$count] == 'ซอง (3.3 G.)'){
                $add->DRUG_UNIT = 19;
            }elseif($d_units[$count] == 'ซอง (6.97 G.)'){
                $add->DRUG_UNIT = 20;
            }elseif($d_units[$count] == 'หลอด (5 G.)'){
                $add->DRUG_UNIT = 21;
           }else{
                $add->DRUG_UNIT = '';
           }

            $add->DRUG_STRENGTH = $d_strength[$count];
            $add->DRUG_UNIT_PRICE = $d_unitprice[$count];
            $add->DRUG_UNIT_PRICE_COST = $d_unitcost[$count];
            $add->DRUG_DID = $d_did[$count];
            $add->STATUS = $d_istatus[$count];
            $add->DRUG_STORE = $store_id[$count];
            $add->save();
         }
        }
        return redirect()->route('setting.drug',[
            'idstore'=>$idstore,
            'iduser'=>$iduser
        ])->with('success','นำเข้ารายการยาเรียบร้อยแล้ว');

    }

    protected static $wsdl;
    private $service;

    public static function setWsdl($service){
        return self::$wsdl = $service;
    }
    public static function getWsdl(){
        return self::$wsdl;
    }

public static function generateContext(){
    self::$options = [
        'http'=>[
            'user_agent'=> 'PHPSoapClient'
        ]
    ];
}
    public static function init(){
        $wsdlUrl = self::getWsdl();
        $soapClientOptions= [
            'stream_context'=> self::generateContext(),
            'cache_wsdl' => WSDL_CACHE_ONEN
        ];
        return new SoapClient($wsdlUrl,$soapClientOptions);
    }

    public function soap(Request $request)
    {
        try {
            self::setWsdl('http://ucws.nhso.go.th/ucwstokenp1/UCWSTokenP1?WSDL');
            // $this->service = InstanceSoapClient::init();

            $prubsit = $this->service->GetByperson(['name' => 'test']);
            $prubsitget = $this->loadXmlStringAsArray($prubsit->GetByperson);

            dd($prubsitget['Table'][1]);
        } catch (\Exception $e) {
           return $e->getMessage();
        }

        $data_hos = DB::connection('mysql2')->table('opdconfig')->get();
        return view('hos.soap',[
            'data_hos'=>$data_hos,
        ]);

    }

}
