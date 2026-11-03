import React from "react";

export default function ListPerusahaan({ data, loading, onTambah, onEdit, onDetail, onDelete, alertMessage }) {
    return (
        <div className="container mt-5">
            <div className="d-flex justify-content-between align-items-center mb-4">
                <h2 className="fw-bold">Data Perusahaan</h2>
                <div>
                    {/* Link download PDF & Excel langsung diarahkan ke route backend Laravel */}
                    <a href="/dataperusahaan/pdf" className="btn btn-danger me-2">
                        Export PDF
                    </a>
                    <a href="/dataperusahaan/excel" className="btn btn-success me-2">
                        Export Excel
                    </a>
                    <button onClick={onTambah} className="btn btn-primary">
                        + Tambah Data Perusahaan
                    </button>
                </div>
            </div>

            {/* Pesan Sukses / Alert */}
            {alertMessage && (
                <div className="alert alert-success alert-dismissible fade show" role="alert">
                    {alertMessage}
                </div>
            )}

            {/* Tabel Data Perusahaan */}
            <div className="card shadow-sm">
                <div className="card-body p-0">
                    <table className="table table-bordered table-striped mb-0">
                        <thead className="table-dark">
                            <tr>
                                <th style={{ width: "60px" }} className="text-center">No</th>
                                <th>Nama Perusahaan</th>
                                <th>Bidang</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th style={{ width: "220px" }} className="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {loading ? (
                                <tr>
                                    <td colSpan="6" className="text-center py-4">
                                        <div className="spinner-border text-primary" role="status">
                                            <span className="visually-hidden">Loading...</span>
                                        </div>
                                    </td>
                                </tr>
                            ) : data.length > 0 ? (
                                data.map((item, index) => (
                                    <tr key={item.id}>
                                        <td className="text-center">{index + 1}</td>
                                        <td>{item.nama_perusahaan}</td>
                                        <td>{item.bidang}</td>
                                        <td>{item.alamat}</td>
                                        <td>{item.telepon}</td>
                                        <td className="text-center">
                                            <button
                                                onClick={() => onDetail(item)}
                                                className="btn btn-info btn-sm text-white me-1"
                                            >
                                                Detail
                                            </button>
                                            <button
                                                onClick={() => onEdit(item)}
                                                className="btn btn-primary btn-sm me-1"
                                            >
                                                Edit
                                            </button>
                                            <button
                                                onClick={() => onDelete(item.id, item.nama_perusahaan)}
                                                className="btn btn-danger btn-sm"
                                            >
                                                Hapus
                                            </button>
                                        </td>
                                    </tr>
                                ))
                            ) : (
                                <tr>
                                    <td colSpan="6" className="text-center py-4 text-muted">
                                        Belum ada data perusahaan.
                                    </td>
                                </tr>
                            )}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}
