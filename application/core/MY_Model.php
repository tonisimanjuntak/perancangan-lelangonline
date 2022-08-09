<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	function create_bobotkriteria()
    {
        $return = false;
        $databobotkriteria = array();
        $rskriteria = $this->db->query("select * from kriteria order by idkriteria");
        if ($rskriteria->num_rows()>0) {
          foreach ($rskriteria->result() as $rowkriteria) {

                $rskriteria2 = $this->db->query("select * from kriteria where idkriteria > '".$rowkriteria->idkriteria."'");
                $jlhkriteria2 = $rskriteria2->num_rows();
                if ($jlhkriteria2>0) {
                  foreach ($rskriteria2->result() as $rowkriteria2) {

                    $idkriteria1     = $rowkriteria->idkriteria;
                    $idkriteria2     = $rowkriteria2->idkriteria;
                    $idbobotkriteria = $idkriteria1.$idkriteria2;

                    if (!empty($idbobotkriteria)) {
                        array_push($databobotkriteria, 
                                        array(
                                        'idbobotkriteria' => $idbobotkriteria, 
                                        'idkriteria1' => $idkriteria1, 
                                        'idkriteria2' => $idkriteria2, 
                                        'bobot' => 0)
                                    );
                    }
                  }
                }


          }

          $insert = $this->db->insert_batch('bobotkriteria', $databobotkriteria);
          if ($insert) {
              $return = true;
          }
        }

        return $return;
    }

    function create_bobotalternatif()
    {

        $return = false;
    	$databobotalternatif = array();

        $rskriteria = $this->db->query("select * from kriteria order by idkriteria");
        if ($rskriteria->num_rows()>0) {
          foreach ($rskriteria->result() as $rowkriteria) {


          		$rsalternatif1 = $this->db->query("select * from alternatif order by idalternatif ");
                if ($rsalternatif1->num_rows()>0) {
                  foreach ($rsalternatif1->result() as $rowalternatif1) {


                  		$rsalternatif2 = $this->db->query("select * from alternatif where idalternatif > '".$rowalternatif1->idalternatif."'");
                        $jlhalternatif2 = $rsalternatif2->num_rows();
                        if ($jlhalternatif2>0) {

                          foreach ($rsalternatif2->result() as $rowalternatif2) {


                          		$idkriteria	 = $rowkriteria->idkriteria;
			                  	$idalternatif1	 = $rowalternatif1->idalternatif;
			                  	$idalternatif2	 = $rowalternatif2->idalternatif;

			                  	$idbobotalternatif = $idkriteria.$idalternatif1.$idalternatif2;
			                  	$bobot = 0;

			                  	if (!empty($idbobotalternatif)) {
			                  		array_push($databobotalternatif, 
			                  						array(
			                  						'idbobotalternatif' => $idbobotalternatif, 
			                  						'idkriteria' => $idkriteria, 
			                  						'idalternatif1' => $idalternatif1, 
			                  						'idalternatif2' => $idalternatif2, 
			                  						'bobot' => $bobot)
			                  					);
			                  	}

                          }

                        }


                  }
                }

          }

          $insert = $this->db->insert_batch('bobotalternatif', $databobotalternatif);
          if ($insert) {
              $return = true;
          }

        }
        return $return;

    }

    public function get_bobotalternatif($idkriteria, $idalternatif1, $idalternatif2)
    {
      $idbobotalternatif = $idkriteria.$idalternatif1.$idalternatif2;
      $this->db->where("idbobotalternatif", $idbobotalternatif);
      return $this->db->get('bobotalternatif')->row()->bobot;
    }


    public function get_bobotalternatif_bp($idkriteria, $idalternatif1, $idalternatif2)
    {
      $rstemp = $this->db->query("select * from bobotalternatif_bp where idkriteria='".$idkriteria."' and idalternatif1='".$idalternatif1."' and idalternatif2='".$idalternatif2."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_bp;
      }else{
        return 0;
      }
    }

    public function get_bobotalternatif_bpn($idkriteria, $idalternatif1, $idalternatif2)
    {
      $rstemp = $this->db->query("select * from bobotalternatif_bpn where idkriteria='".$idkriteria."' and idalternatif1='".$idalternatif1."' and idalternatif2='".$idalternatif2."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_bpn;
      }else{
        return 0;
      }
    }


    public function get_bobotalternatif_bp_total($idkriteria, $idalternatif2)
    {
      $total = $this->db->query("select sum(bobot_bp) as total from bobotalternatif_bp where idkriteria='".$idkriteria."' and idalternatif2='".$idalternatif2."'")->row()->total;
      if ($total=="") {
        $total = 0;
      }
      return $total;
    }

    public function get_bobotalternatif_ev($idkriteria, $idalternatif)
    {
      $rstemp = $this->db->query("select * from bobotalternatif_ev where idkriteria='".$idkriteria."' and idalternatif='".$idalternatif."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_ev;
      }else{
        return 0;
      }
    }


    public function get_bobotalternatif_ev_cv($idkriteria, $idalternatif)
    {
      $rstemp = $this->db->query("select * from bobotalternatif_ev where idkriteria='".$idkriteria."' and idalternatif='".$idalternatif."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_cv;
      }else{
        return 0;
      }
    }

    public function get_bobotalternatif_kali_ev($idkriteria, $idalternatif)
    {
      $rstemp = $this->db->query("select * from bobotalternatif_ev where idkriteria='".$idkriteria."' and idalternatif='".$idalternatif."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_kali_ev;
      }else{
        return 0;
      }
    }






    public function get_bobotkriteria($idkriteria1, $idkriteria2)
    {
      $idbobotkriteria = $idkriteria1.$idkriteria2;
      return $this->db->query("select * from bobotkriteria where idbobotkriteria='".$idbobotkriteria."'")->row()->bobot;
    }

    public function get_bobotkriteria_bp($idkriteria1, $idkriteria2)
    {
      $rstemp = $this->db->query("select * from bobotkriteria_bp where idkriteria1='".$idkriteria1."' and idkriteria2='".$idkriteria2."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_bp;
      }else{
        return 0;
      }
    }

    public function get_bobotkriteria_bpn($idkriteria1, $idkriteria2)
    {
      $rstemp = $this->db->query("select * from bobotkriteria_bpn where idkriteria1='".$idkriteria1."' and idkriteria2='".$idkriteria2."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_bpn;
      }else{
        return 0;
      }
    }

    public function get_bobotkriteria_ev($idkriteria)
    {
      $rstemp = $this->db->query("select * from bobotkriteria_ev where idkriteria='".$idkriteria."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_ev;
      }else{
        return 0;
      }
    }

    public function get_bobotkriteria_ev_cv($idkriteria)
    {
      $rstemp = $this->db->query("select * from bobotkriteria_ev where idkriteria='".$idkriteria."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_cv;
      }else{
        return 0;
      }
    }

    public function get_bobotkriteria_kali_ev($idkriteria)
    {
      $rstemp = $this->db->query("select * from bobotkriteria_ev where idkriteria='".$idkriteria."'");
      if ($rstemp->num_rows()>0) {
        return $rstemp->row()->bobot_kali_ev;
      }else{
        return 0;
      }
    }


    public function get_bobotkriteria_bp_total($idkriteria)
    {
      $total = $this->db->query("select sum(bobot_bp) as total from bobotkriteria_bp where idkriteria2='".$idkriteria."'")->row()->total;
      if ($total=="") {
        $total = 0;
      }
      return $total;
    }

    public function insert_bobotkriteria_bp()
    {
      $return = true;
      $this->db->query("delete from bobotkriteria_bp");
      $rskriteria = $this->db->query("select * from kriteria order by idkriteria asc");
      $rskriteria2 = $this->db->query("select * from kriteria order by idkriteria asc");
      if ($rskriteria->num_rows()>0) {
        foreach ($rskriteria->result() as $rowkriteria1) {
          
          if ($rskriteria2->num_rows()>0) {
            foreach ($rskriteria2->result() as $rowkriteria2) {
              
              if ($rowkriteria1->idkriteria==$rowkriteria2->idkriteria) {
                $bobot_bp = 1;
              }elseif ($rowkriteria1->idkriteria < $rowkriteria2->idkriteria) {
                $bobot_bp = $this->get_bobotkriteria($rowkriteria1->idkriteria, $rowkriteria2->idkriteria);
              }else
              {
                $bobot_temp = $this->get_bobotkriteria($rowkriteria2->idkriteria, $rowkriteria1->idkriteria);
                if ($bobot_temp!=0) {
                  $bobot_bp = 1 / $bobot_temp;                  
                }else{
                  $bobot_bp=0;
                }
              }

              $query = "insert into bobotkriteria_bp(idkriteria1, idkriteria2, bobot_bp) 
                        values('".$rowkriteria1->idkriteria."','".$rowkriteria2->idkriteria."',".$bobot_bp.")";
              $insert = $this->db->query($query);
              if (!$insert) {
                $return = false;
              }
            }
          }

        }
      }
      return $return;
    }


    public function insert_bobotkriteria_bpn()
    {
      $return = true;
      $this->db->query("delete from bobotkriteria_bpn");
      $this->db->query("delete from bobotkriteria_ev");

      $rskriteria = $this->db->query("select * from kriteria order by idkriteria asc");
      $rskriteria2 = $this->db->query("select * from kriteria order by idkriteria asc");
      if ($rskriteria->num_rows()>0) {
        foreach ($rskriteria->result() as $rowkriteria1) {
          
          $bobot_ev = 0;
          $subtotal_bobot = 0;
          $jumlahKriteria = 0;
          if ($rskriteria2->num_rows()>0) {
            foreach ($rskriteria2->result() as $rowkriteria2) {
              
              $bobot_bp = $this->get_bobotkriteria_bp($rowkriteria1->idkriteria, $rowkriteria2->idkriteria);
              $total_kriteria = $this->get_bobotkriteria_bp_total($rowkriteria2->idkriteria);

              if ($bobot_bp==0 || $total_kriteria==0) {
                $bobot_bpn=0;
              }else{
                $bobot_bpn = $bobot_bp / $total_kriteria;
              }

              $query = "insert into bobotkriteria_bpn(idkriteria1, idkriteria2, bobot_bpn) 
                        values('".$rowkriteria1->idkriteria."','".$rowkriteria2->idkriteria."',".$bobot_bpn.")";
              $insert = $this->db->query($query);
              if (!$insert) {
                $return = false;
              }
              $subtotal_bobot += $bobot_bpn;
              $jumlahKriteria++;
            }
            $bobot_ev = $subtotal_bobot/$jumlahKriteria;
          }

          $query = "insert into bobotkriteria_ev(idkriteria, bobot_ev, bobot_kali_ev, bobot_cv) 
                      values('".$rowkriteria1->idkriteria."',".$bobot_ev.", 0, 0)";
          $this->db->query($query);

        }
      }
      return $return;
    }



    public function insert_bobotkriteria_kali_ev()
    {
      $return = true;
      $rskriteria = $this->db->query("select * from kriteria order by idkriteria asc");
      if ($rskriteria->num_rows()>0) {
        foreach ($rskriteria->result() as $rowkriteria1) {
          
          $bobot_ev = 0;
          $subtotal_kali_ev = 0;
          $rskriteria2 = $this->db->query("select * from bobotkriteria_bp where idkriteria1='".$rowkriteria1->idkriteria."' order by idkriteria2 asc");
          if ($rskriteria2->num_rows()>0) {
            foreach ($rskriteria2->result() as $rowkriteria2) {
              
              $bobot_bp = $rowkriteria2->bobot_bp;
              $bobot_ev = $this->get_bobotkriteria_ev($rowkriteria2->idkriteria2); //baris pertama dikali dengan kolom pertama
              if ($bobot_ev==0 || $bobot_ev=="") {
                $bobot_kali_ev = 0;
              }else{
                $bobot_kali_ev = $bobot_bp * $bobot_ev;                
              }
              $subtotal_kali_ev += $bobot_kali_ev;
            }
          }

          $query = "update bobotkriteria_ev set bobot_kali_ev = ".$subtotal_kali_ev." where idkriteria='".$rowkriteria1->idkriteria."'";
          $this->db->query($query);
        }
      }
      return $return;
    }


    public function insert_bobotkriteria_ev_cv()
    {
      $return = true;
      $rsev = $this->db->query("select * from bobotkriteria_ev order by idkriteria asc");
      if ($rsev->num_rows()>0) {
        foreach ($rsev->result() as $rowev) {
          
          $bobot_ev = $rowev->bobot_ev;
          $bobot_kali_ev = $rowev->bobot_kali_ev;
          if ($bobot_ev==0 || $bobot_kali_ev==0) {
            $bobot_cv=0;
          }else{
            $bobot_cv = $bobot_kali_ev / $bobot_ev;
          }

          $query = "update bobotkriteria_ev set bobot_cv = ".$bobot_cv." where idkriteria='".$rowev->idkriteria."'";
          $this->db->query($query);
        }
      }
      return $return;
    }



    /*
      ====================================================================================================
                    ALTERNATIF
      ====================================================================================================
    */

    public function insert_bobotalternatif_bp($idkriteria)
    {
      $return = true;
      $this->db->query("delete from bobotalternatif_bp where idkriteria='".$idkriteria."'");
      $rsalternatif1 = $this->db->query("select * from alternatif order by idalternatif asc");
      $rsalternatif2 = $this->db->query("select * from alternatif order by idalternatif asc");

      if ($rsalternatif1->num_rows()>0) {
        foreach ($rsalternatif1->result() as $rowalternatif1) {
          
          if ($rsalternatif2->num_rows()>0) {
            foreach ($rsalternatif2->result() as $rowalternatif2) {
              
              if ($rowalternatif1->idalternatif==$rowalternatif2->idalternatif) {
                $bobot_bp = 1;
              }elseif ($rowalternatif1->idalternatif < $rowalternatif2->idalternatif) {
                $bobot_bp = $this->get_bobotalternatif($idkriteria, $rowalternatif1->idalternatif, $rowalternatif2->idalternatif);
              }else
              {
                $bobot_temp = $this->get_bobotalternatif($idkriteria, $rowalternatif2->idalternatif, $rowalternatif1->idalternatif);
                if ($bobot_temp!=0) {
                  $bobot_bp = 1 / $bobot_temp;                  
                }else{
                  $bobot_bp=0;
                }
              }

              $query = "insert into bobotalternatif_bp(idkriteria, idalternatif1, idalternatif2, bobot_bp) 
                        values('".$idkriteria."','".$rowalternatif1->idalternatif."','".$rowalternatif2->idalternatif."',".$bobot_bp.")";
              $insert = $this->db->query($query);
              if (!$insert) {
                $return = false;
              }
            }
          }

        }
      }


      return $return;
    }


    public function insert_bobotalternatif_bpn($idkriteria)
    {
      $return = true;
      $this->db->query("delete from bobotalternatif_bpn where idkriteria='".$idkriteria."'");
      $this->db->query("delete from bobotalternatif_ev where idkriteria='".$idkriteria."'");

      $rsalternatif1 = $this->db->query("select * from alternatif order by idalternatif asc");
      $rsalternatif2 = $this->db->query("select * from alternatif order by idalternatif asc");
      if ($rsalternatif1->num_rows()>0) {
        foreach ($rsalternatif1->result() as $rowalternatif1) {
          
          $bobot_ev = 0;
          $subtotal_bobot = 0;
          $jumlahKriteria = 0;
          if ($rsalternatif2->num_rows()>0) {
            foreach ($rsalternatif2->result() as $rowalternatif2) {
              
              $bobot_bp = $this->get_bobotalternatif_bp($idkriteria, $rowalternatif1->idalternatif, $rowalternatif2->idalternatif);
              $total_kriteria = $this->get_bobotalternatif_bp_total($idkriteria, $rowalternatif2->idalternatif);

              if ($bobot_bp==0 || $total_kriteria==0) {
                $bobot_bpn=0;
              }else{
                $bobot_bpn = $bobot_bp / $total_kriteria;
              }

              $query = "insert into bobotalternatif_bpn(idkriteria, idalternatif1, idalternatif2, bobot_bpn) 
                        values('".$idkriteria."', '".$rowalternatif1->idalternatif."','".$rowalternatif2->idalternatif."',".$bobot_bpn.")";
              $insert = $this->db->query($query);
              if (!$insert) {
                $return = false;
              }
              $subtotal_bobot += $bobot_bpn;
              $jumlahKriteria++;
            }
            $bobot_ev = $subtotal_bobot/$jumlahKriteria;
          }

          $query = "insert into bobotalternatif_ev(idkriteria, idalternatif, bobot_ev, bobot_kali_ev, bobot_cv) 
                      values('".$idkriteria."', '".$rowalternatif1->idalternatif."',".$bobot_ev.", 0, 0)";
          $this->db->query($query);

        }
      }
      return $return;
    }



    public function insert_bobotalternatif_kali_ev($idkriteria)
    {
      $return = true;
      $rsalternatif = $this->db->query("select * from alternatif order by idalternatif asc");
      if ($rsalternatif->num_rows()>0) {
        foreach ($rsalternatif->result() as $rowalternatif1) {
          
          $bobot_ev = 0;
          $subtotal_kali_ev = 0;
          $rsalternatif2 = $this->db->query("select * from bobotalternatif_bp where idkriteria='".$idkriteria."' and idalternatif1='".$rowalternatif1->idalternatif."' order by idalternatif2 asc");
          if ($rsalternatif2->num_rows()>0) {
            foreach ($rsalternatif2->result() as $rowalternatif2) {
              
              $bobot_bp = $rowalternatif2->bobot_bp;
              $bobot_ev = $this->get_bobotalternatif_ev($idkriteria, $rowalternatif2->idalternatif2); //baris pertama dikali dengan kolom pertama
              if ($bobot_ev==0 || $bobot_ev=="") {
                $bobot_kali_ev = 0;
              }else{
                $bobot_kali_ev = $bobot_bp * $bobot_ev;                
              }
              $subtotal_kali_ev += $bobot_kali_ev;
            }
          }

          $query = "update bobotalternatif_ev set bobot_kali_ev = ".$subtotal_kali_ev." where idkriteria='".$idkriteria."' and idalternatif='".$rowalternatif1->idalternatif."'";
          $this->db->query($query);
        }
      }
      return $return;
    }



    public function insert_bobotalternatif_ev_cv($idkriteria)
    {
      $return = true;
      $rsev = $this->db->query("select * from bobotalternatif_ev where idkriteria='".$idkriteria."' order by idalternatif asc");
      if ($rsev->num_rows()>0) {
        foreach ($rsev->result() as $rowev) {
          
          $bobot_ev = $rowev->bobot_ev;
          $bobot_kali_ev = $rowev->bobot_kali_ev;
          if ($bobot_ev==0 || $bobot_kali_ev==0) {
            $bobot_cv=0;
          }else{
            $bobot_cv = $bobot_kali_ev / $bobot_ev;
          }

          $query = "update bobotalternatif_ev set bobot_cv = ".$bobot_cv." where idkriteria='".$idkriteria."' and idalternatif='".$rowev->idalternatif."'";
          $this->db->query($query);
        }
      }
      return $return;
    }


    public function insert_lamdamaxs($idkriteria)
    {
      $return = true;

      // Tabel RI sudah default sebagai pembagi sesuai dengan jumlah kriteria nya
      $dataRI = array();
      $dataRI[] = 0;
      $dataRI[] = 0;
      $dataRI[] = 0.58;
      $dataRI[] = 0.9;
      $dataRI[] = 1.12;
      $dataRI[] = 1.24;
      $dataRI[] = 1.32;
      $dataRI[] = 1.41;
      $dataRI[] = 1.45;
      $dataRI[] = 1.49;
      $dataRI[] = 1.51;
      $dataRI[] = 1.48;
      $dataRI[] = 1.56;
      $dataRI[] = 1.57;
      $dataRI[] = 1.58;


      $total_cv = $this->db->query("select sum(bobot_cv) as total_cv from bobotalternatif_ev where idkriteria='".$idkriteria."'")->row()->total_cv;
      if ($total_cv=="") {
        $total_cv=0;
      }
      if ($total_cv==0) {
      }else{
        $jumlahalternatif = $this->db->query("select count(*) as jumlahalternatif from alternatif")->row()->jumlahalternatif;
        $lamda = $total_cv/ $jumlahalternatif;        
        $ci = ($lamda-$jumlahalternatif)/ ($jumlahalternatif-1);
        $cr = $ci/ $dataRI[$jumlahalternatif-1]; // jumlah kriteria tambah satu karena dimulai dari nol        
      }
      $query = "update kriteria set lamdamaxs = ".$lamda.", ci ='".$ci."', cr ='".$cr."' where idkriteria='".$idkriteria."'";
      $this->db->query($query);
      return $return;

    }



}

/* End of file MY_Model.php */
/* Location: ./application/core/MY_Model.php */