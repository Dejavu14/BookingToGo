package main

import (
	"database/sql"
	"fmt"
	"log"
	"net/http"

	"github.com/gorilla/mux"
	_ "github.com/lib/pq"
)

// Struktur data untuk model Form
type Form struct {
	ID              int    `json:"id"`
	Nama            string `json:"nama"`
	TanggalLahir    string `json:"tanggal_lahir"`
	Kewarganegaraan string `json:"kewarganegaraan"`
}

func CreateForm(w http.ResponseWriter, r *http.Request) {
	// Logika untuk membuat formulir baru dan menyimpannya ke database
}

func ReadForm(w http.ResponseWriter, r *http.Request) {
	// Logika untuk membaca formulir dari database
}

func UpdateForm(w http.ResponseWriter, r *http.Request) {
	// Logika untuk memperbarui formulir dalam database
}

func DeleteForm(w http.ResponseWriter, r *http.Request) {
	// Logika untuk menghapus formulir dari database
}

func main() {
	// Inisialisasi koneksi database PostgreSQL
	db, err := sql.Open("postgres", "user=postgres dbname=DB_USER password=root sslmode=disable")

	if err != nil {
		log.Fatal(err)
	}
	defer db.Close()

	// Membuat router Gorilla Mux
	r := mux.NewRouter()

	// Rute untuk membuat formulir baru (POST)
	r.HandleFunc("/api/forms", CreateForm).Methods("POST")

	// Rute untuk membaca formulir berdasarkan ID (GET)
	r.HandleFunc("/api/forms/{id}", ReadForm).Methods("GET")

	// Rute untuk memperbarui formulir berdasarkan ID (PUT)
	r.HandleFunc("/api/forms/{id}", UpdateForm).Methods("PUT")

	// Rute untuk menghapus formulir berdasarkan ID (DELETE)
	r.HandleFunc("/api/forms/{id}", DeleteForm).Methods("DELETE")

	http.Handle("/", r)

	// Jalankan server HTTP di port tertentu
	port := ":8080"
	fmt.Printf("Server is listening on port %s...\n", port)
	log.Fatal(http.ListenAndServe(port, nil))
}
