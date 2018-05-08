<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Trashcan extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if(!empty($this->barcode_plastika) || !empty($this->rfid_plastika)){
            $paired_plastika = true;
        } else { $paired_plastika = false;}

        if(!empty($this->barcode_papir) || !empty($this->rfid_papir)){
            $paired_papir = true;
        } else { $paired_papir = false;}

        if(!empty($this->barcode_staklo) || !empty($this->rfid_staklo)){
            $paired_staklo = true;
        } else { $paired_staklo = false;}

        if(!empty($this->barcode_metal) || !empty($this->rfid_metal)){
            $paired_metal = true;
        } else { $paired_metal = false;}

        if(!empty($this->barcode_ostalo) || !empty($this->rfid_ostalo)){
            $paired_ostalo = true;
        } else { $paired_ostalo = false;}

        $plastika = [
            'ID' => $this->sifra,
            'trash_can_id' => $this->kantabroj,
            'full_name' => $this->imepre,
            'building_number' => $this->kucni_broj,
            'place' => $this->mjesto,
            'street' => $this->ulica,
            '_id' => $this->sifra.'-plastika',
            'trash_type' => 'plastika',
            'paired' => $paired_plastika,
            'barcode' => $this->barcode_plastika,
            'rfid' => $this->rfid_plastika,
        ];

        $staklo = [
            'ID' => $this->sifra,
            'trash_can_id' => $this->kantabroj,
            'full_name' => $this->imepre,
            'building_number' => $this->kucni_broj,
            'place' => $this->mjesto,
            'street' => $this->ulica,
            '_id' => $this->sifra.'-staklo',
            'trash_type' => 'staklo',
            'paired' => $paired_staklo,
            'barcode' => $this->barcode_staklo,
            'rfid' => $this->rfid_staklo,
        ];

        $papir = [
            'ID' => $this->sifra,
            'trash_can_id' => $this->kantabroj,
            'full_name' => $this->imepre,
            'building_number' => $this->kucni_broj,
            'place' => $this->mjesto,
            'street' => $this->ulica,
            '_id' => $this->sifra.'-papir',
            'trash_type' => 'papir',
            'paired' => $paired_papir,
            'barcode' => $this->barcode_papir,
            'rfid' => $this->rfid_papir,
        ];

        $metal = [
            'ID' => $this->sifra,
            'trash_can_id' => $this->kantabroj,
            'full_name' => $this->imepre,
            'building_number' => $this->kucni_broj,
            'place' => $this->mjesto,
            'street' => $this->ulica,
            '_id' => $this->sifra.'-metal',
            'trash_type' => 'metal',
            'paired' => $paired_metal,
            'barcode' => $this->barcode_metal,
            'rfid' => $this->rfid_metal,
        ];

        $ostalo = [
            'ID' => $this->sifra,
            'trash_can_id' => $this->kantabroj,
            'full_name' => $this->imepre,
            'building_number' => $this->kucni_broj,
            'place' => $this->mjesto,
            'street' => $this->ulica,
            '_id' => $this->sifra.'-ostalo',
            'trash_type' => 'ostalo',
            'paired' => $paired_ostalo,
            'barcode' => $this->barcode_ostalo,
            'rfid' => $this->rfid_ostalo,
        ];

        return array($plastika, $papir, $staklo, $metal, $ostalo);

    }
}
