import React from "react";

export default function DetailPerusahaan({ item, onKembali, onEdit }) {
    if (!item) return null;

    return (
        <div className="container mt-5">
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <div className="card shadow-sm">
                        <div className="card-header bg-primary text-white">
                            <h5 className="mb-0">Detail Perusahaan - {item.nama_perusahaan}</h5>
                        </div>
                        <div className="card-body p-4">
                            <table className="table table-bordered mb-4">
                                <tbody>
                                    <tr>
                                        <th style={{ width: "30%", backgroundColor: "#f8f9fa" }}>Nama Perusahaan</th>
                                        <td>{item.nama_perusahaan}</td>
                                    </tr>
                                    <tr>
                                        <th style={{ backgroundColor: "#f8f9fa" }}>Bidang</th>
                                        <td>{item.bidang}</td>
                                    </tr>
                                    <tr>
                                        <th style={{ backgroundColor: "#f8f9fa" }}>Alamat</th>
                                        <td>{item.alamat}</td>
                                    </tr>
                                    <tr>
                                        <th style={{ backgroundColor: "#f8f9fa" }}>Telepon</th>
                                        <td>{item.telepon}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <div className="d-flex justify-content-between">
                                <button onClick={onKembali} className="btn btn-secondary">
                                    &larr; Kembali
                                </button>
                                <button onClick={() => onEdit(item)} className="btn btn-primary">
                                    Edit Perusahaan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}
