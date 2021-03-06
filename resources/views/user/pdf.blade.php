@extends('user.master')
@section('title', 'Export User to PDF')
@section('content')
<!DOCTYPE html>
    <h2 align="center">ใบรายงานตัวคุณ : {{$user->fname}} | รหัสประจำตัว : {{$user->id}}</h2>
    <p align="center">
          การตรวจสุขภาพ (Physical Examination หรือ Medical Examination หรือ Clinical Examination) คือ การตรวจประเมินสุขภาพของบุคคลทั่วไป โดยผู้ที่เข้ารับการตรวจคือผู้ที่ยังไม่มีอาการป่วยหรือไม่มีอาการผิดปกติใดๆเกิดขึ้น<br>ซึ่งการตรวจสุขภาพเป็นเพียงการตรวจเพื่อประเมินสุขภาพ
          โดยรวมของผู้ตรวจว่ามีความเสี่ยงต่อการเป็นโรคเกิดขึ้นหรือไม่
          เพื่อที่ผู้รับการตรวจจะได้ปรับเปลี่ยนพฤติกรรมและดูแลด้านโภชนาการอาหาร
          การออกกำลังกายให้เหมาะสมกับสภาวะร่างกายที่เป็นอยู่เพื่อที่ร่างกายจะได้มีสุขภาพแข็งแรง
          ลดความเสี่ยงในการเกิดโรค ซึ่งการตรวจสุขภาพควรตรวจปีลaะ 1 ครั้งเป็นประจำทุกปี
          สำหรับผู้ที่ทำงานประจำทางบริษัทต้นสังกัดจะมีการจัดตรวจสุขภาพประจำปีทุกปีให้กับพนักงานทุกคน
          เมื่อทำการตรวจสุขภาพมาแล้ว หลายท่านได้รับผลตรวจออกมาเป็นตัวเลขกับตัวอังกฤษมากมาย
    </p>
          <p align="right">ลงชื่อ...........................</p>
          <p align="right">{{$user->fname}} {{$user->lname}}</p>
@endsection
