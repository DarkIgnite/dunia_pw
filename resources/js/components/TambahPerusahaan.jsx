import React, { useState } from "react";
import axios from "axios";

export default function TambahPerusahaan({ onKembali, onSuccess }) {
    const [formData, setFormData] = useState({
        nama_perusahaan: "",
        bidang: "",
        alamat: "",
        telepon: "",
    });
    const [submitting, setSubmitting] = useState(false);
    const [error, setError] = useState(null);

    const handleChange = (e) => {
        setFormData({
            ...formData,
            [e.target.name]: e.target.value,
        });
    };

    const handleSubmit = async (e) => {
        e.preventDefault();
        setSubmitting(true);
        setError(null);

        try {
            const response = await axios.post("/api/perusahaan", formData);
            onSuccess(response.data.message || "Data berhasil ditambahkan!");
        } catch (err) {
            console.error(err);
            if (err.response && err.response.data && err.response.data.errors) {
                const errorMessages = Object.values(err.response.data.errors).flat().join(", ");
                setError(errorMessages);
            } else {
                setError("Gagal menyimpan data. Silakan coba lagi.");
            }
        } finally {
            setSubmitting(false);
        }
    };

    return (
        <div className="container mt-5 mb-5">
            <div className="card shadow-sm mx-auto" style={{ maxWidth: "600px" }}>
                <div className="card-header bg-primary text-white">
                    <h5 className="mb-0">Tambah Data Perusahaan</h5>
                </div>
                <div className="card-body p-4">
                    {error && <div className="alert alert-danger">{error}</div>}

                    <form onSubmit={handleSubmit}>
                        <div className="mb-3">
                            <label className="form-label fw-semibold">Nama Perusahaan</label>
                            <input
                                type="text"
                                name="nama_perusahaan"
                                className="form-control"
                                value={formData.nama_perusahaan}
                                onChange={handleChange}
                                placeholder="Masukkan nama perusahaan"
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <label className="form-label fw-semibold">Bidang</label>
                            <input
                                type="text"
                                name="bidang"
                                className="form-control"
                                value={formData.bidang}
                                onChange={handleChange}
                                placeholder="Contoh: Teknologi Informasi, Manufaktur"
                                required
                            />
                        </div>

                        <div className="mb-3">
                            <label className="form-label fw-semibold">Alamat</label>
                            <textarea
                                name="alamat"
                                className="form-control"
                                rows="3"
                                value={formData.alamat}
                                onChange={handleChange}
                                placeholder="Masukkan alamat lengkap"
                                required
                            ></textarea>
                        </div>

                        <div className="mb-4">
                            <label className="form-label fw-semibold">Telepon</label>
                            <input
                                type="text"
                                name="telepon"
                                className="form-control"
                                value={formData.telepon}
                                onChange={handleChange}
                                placeholder="Contoh: 08123456789 / 021-12345"
                                required
                            />
                        </div>

                        <div className="d-flex justify-content-between">
                            <button
                                type="button"
                                onClick={onKembali}
                                className="btn btn-secondary"
                                disabled={submitting}
                            >
                                Kembali
                            </button>
                            <button
                                type="submit"
                                className="btn btn-primary"
                                disabled={submitting}
                            >
                                {submitting ? "Menyimpan..." : "Simpan Data"}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}
