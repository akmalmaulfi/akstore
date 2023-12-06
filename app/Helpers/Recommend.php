<?php

namespace App\Helpers;

class Recommend
{

    public function similarityDistance($preferences, $person1, $person2)
    {
        // Array untuk menyimpan kesamaan item yang dinilai oleh kedua pengguna
        $similar = array();
        // Variabel untuk menyimpan hasil penjumlahan kuadrat dari perbedaan nilai item
        $sum = 0;

        // Iterasi melalui preferensi pengguna pertama ($person1)
        foreach ($preferences[$person1] as $key => $value) {
            // Periksa apakah item yang sama dinilai oleh pengguna kedua ($person2)
            if (array_key_exists($key, $preferences[$person2]))
                // Jika item dinilai oleh kedua pengguna, simpan sebagai item yang sama
                $similar[$key] = 1;
        }

        // Jika tidak ada item yang sama yang dinilai oleh kedua pengguna, kembalikan nilai 0
        if (count($similar) == 0)
            return 0;

        // Iterasi lagi melalui preferensi pengguna pertama ($person1)
        foreach ($preferences[$person1] as $key => $value) {
            // Periksa apakah item yang sama dinilai oleh pengguna kedua ($person2)
            if (array_key_exists($key, $preferences[$person2]))
                // Hitung jumlah penjumlahan kuadrat dari perbedaan nilai item
                $sum = $sum + pow($value - $preferences[$person2][$key], 2);
        }

        // Hitung nilai similarity distance berdasarkan formula Euclidean distance
        return  1 / (1 + sqrt($sum));
    }

    public function getRecommendations($matrix, $person)
    {
        // Inisialisasi variabel untuk perhitungan rekomendasi
        $total = array();  // Menyimpan jumlah penilaian produk yang direkomendasikan
        $simSums = array();  // Menyimpan jumlah similarity untuk normalisasi
        $ranks = array();  // Menyimpan nilai rekomendasi
        $sim = 0;  // Nilai similarity antara pengguna

        // Iterasi melalui setiap pengguna pada matriks preferensi
        foreach ($matrix as $otherPerson => $items) {
            // Periksa apakah pengguna saat ini bukan pengguna yang diminta rekomendasinya
            if ($otherPerson != $person) {
                // Hitung similarity antara pengguna saat ini dan pengguna lain
                $sim = $this->similarityDistance($matrix, $person, $otherPerson);
            }

            // Jika nilai similarity lebih dari 0, lakukan perhitungan rekomendasi
            if ($sim > 0) {
                foreach ($matrix[$otherPerson] as $item => $value) {
                    // Periksa apakah pengguna saat ini belum memberi nilai pada item ini
                    if (!array_key_exists($item, $matrix[$person])) {
                        // Hitung jumlah total penilaian produk yang direkomendasikan
                        if (!array_key_exists($item, $total)) {
                            $total[$item] = 0;
                        }
                        $total[$item] += $matrix[$otherPerson][$item] * $sim;

                        // Hitung jumlah similarity untuk normalisasi
                        if (!array_key_exists($item, $simSums)) {
                            $simSums[$item] = 0;
                        }
                        $simSums[$item] += $sim;
                    }
                }
            }
        }

        // Normalisasi nilai rekomendasi untuk setiap produk
        foreach ($total as $item => $value) {
            $ranks[$item] = $value / $simSums[$item];
        }

        // Urutkan nilai rekomendasi dari yang tertinggi ke terendah
        arsort($ranks);

        // Bentuk output yang berisi ID produk dan nilai ratingnya
        $result = [];
        foreach ($ranks as $item => $rating) {
            $result[] = ['id' => $item, 'rate' => $rating];
        }

        // Kembalikan hasil rekomendasi dalam bentuk array ID produk dan nilai ratingnya
        return $result;
    }
}
