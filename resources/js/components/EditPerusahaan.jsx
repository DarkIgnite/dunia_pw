import React, { useState } from "react";
import axios from "axios";

export default function EditPerusahaan({ item, onKembali, onSuccess }) {
    const [formData, setFormData] = useState({
        nama_perusahaan: item.nama_perusahaan || "",
        bidang: item.bidang || "",
        alamat: item.alamat || "",
        telepon: item.telepon || "",
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
            const response = await axios.put(`/api/perusahaan/${item.id}`, formData);
            onSuccess(response.data.message || "Data berhasil diupdate!");
        } catch (err) {
            console.error(err);
            if (err.response && err.response.data && err.response.data.errors) {
                const errorMessages = Object.values(err.response.data.errors).flat().join(", ");
                setError(errorMessages);
            } else {
                setError("Gagal mengupdate data. Silakan coba lagi.");
            }
        } finally {
            setSubmitting(false);
        }
    };

    return (
        <div className="container mt-5 mb-5">
            <div className="card shadow-sm mx-auto" style={{ maxWidth: "600px" }}>
                <div className="card-header bg-dark text-white">
                    <h5 className="mb-0">Edit Data Perusahaan</h5>
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
                                className="btn btn-dark"
                                disabled={submitting}
                            >
                                {submitting ? "Menyimpan..." : "Update Data"}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    );
}
