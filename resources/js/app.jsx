import React, { useState, useEffect } from "react";
import { createRoot } from "react-dom/client";
import axios from "axios";
import "./bootstrap";

// Import komponen-komponen halaman
import ListPerusahaan from "./components/ListPerusahaan";
import TambahPerusahaan from "./components/TambahPerusahaan";
import EditPerusahaan from "./components/EditPerusahaan";
import DetailPerusahaan from "./components/DetailPerusahaan";

function App() {
    // State untuk menentukan halaman mana yang sedang aktif ('list', 'tambah', 'edit', 'detail')
    const [page, setPage] = useState("list");

    // State untuk menyimpan data perusahaan dari database
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);

    // State untuk data yang sedang dipilih (untuk Edit / Detail)
    const [selectedItem, setSelectedItem] = useState(null);

    // State untuk notifikasi sukses
    const [alertMessage, setAlertMessage] = useState(null);

    // Mengambil data perusahaan dari Laravel API
    const fetchData = async () => {
        setLoading(true);
        try {
            const response = await axios.get("/api/perusahaan");
            setData(response.data);
        } catch (error) {
            console.error("Gagal mengambil data:", error);
        } finally {
            setLoading(false);
        }
    };

    // Ambil data saat aplikasi pertama kali dimuat
    useEffect(() => {
        fetchData();
    }, []);

    // Fungsi untuk menghapus data perusahaan
    const handleDelete = async (id, nama) => {
        if (window.confirm(`Apakah Anda yakin ingin menghapus "${nama}"?`)) {
            try {
                await axios.delete(`/api/perusahaan/${id}`);
                setAlertMessage(`Data "${nama}" berhasil dihapus!`);
                // Refresh data setelah dihapus
                fetchData();
            } catch (error) {
                console.error("Gagal menghapus data:", error);
                alert("Gagal menghapus data perusahaan.");
            }
        }
    };

    // Handler ketika berhasil tambah data
    const handleSuccessTambah = (msg) => {
        setAlertMessage(msg);
        setPage("list");
        fetchData();
    };

    // Handler ketika berhasil edit data
    const handleSuccessEdit = (msg) => {
        setAlertMessage(msg);
        setPage("list");
        fetchData();
    };

    // Handler membuka halaman detail
    const handleOpenDetail = (item) => {
        setSelectedItem(item);
        setPage("detail");
    };

    // Handler membuka halaman edit
    const handleOpenEdit = (item) => {
        setSelectedItem(item);
        setPage("edit");
    };

    return (
        <div className="min-vh-100 py-4">
            {/* Navigasi / Header Sederhana */}
            <nav className="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
                <div className="container">
                    <span 
                        className="navbar-brand fw-bold" 
                        style={{ cursor: "pointer" }}
                        onClick={() => setPage("list")}
                    >
                        🏢 Aplikasi Data Perusahaan (React)
                    </span>
                    <button 
                        className="btn btn-outline-light btn-sm"
                        onClick={() => {
                            setAlertMessage(null);
                            setPage("list");
                            fetchData();
                        }}
                    >
                        🔄 Refresh Data
                    </button>
                </div>
            </nav>

            {/* Render halaman sesuai state 'page' */}
            {page === "list" && (
                <ListPerusahaan
                    data={data}
                    loading={loading}
                    onTambah={() => {
                        setAlertMessage(null);
                        setPage("tambah");
                    }}
                    onEdit={handleOpenEdit}
                    onDetail={handleOpenDetail}
                    onDelete={handleDelete}
                    alertMessage={alertMessage}
                />
            )}

            {page === "tambah" && (
                <TambahPerusahaan
                    onKembali={() => setPage("list")}
                    onSuccess={handleSuccessTambah}
                />
            )}

            {page === "edit" && selectedItem && (
                <EditPerusahaan
                    item={selectedItem}
                    onKembali={() => setPage("list")}
                    onSuccess={handleSuccessEdit}
                />
            )}

            {page === "detail" && selectedItem && (
                <DetailPerusahaan
                    item={selectedItem}
                    onKembali={() => setPage("list")}
                    onEdit={handleOpenEdit}
                />
            )}
        </div>
    );
}

// Render React App ke dalam elemen <div id="app"></div> di Blade
const rootElement = document.getElementById("app");
if (rootElement) {
    createRoot(rootElement).render(<App />);
}
