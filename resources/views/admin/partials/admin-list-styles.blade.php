{{-- Styles communs pour les pages de liste admin (vidéos, users, catégories, commentaires, notifications) --}}
<style>
.admin-list-page {
    --admin-bg: #0f172a;
    --admin-accent: #3cff9e;
    --admin-accent-dim: rgba(60, 255, 158, 0.15);
    --admin-card: rgba(255, 255, 255, 0.98);
    --admin-text: #0f172a;
    --admin-text-muted: #64748b;
    --admin-border: rgba(60, 255, 158, 0.2);
    --admin-shadow: 0 8px 32px rgba(15, 23, 42, 0.1);
    --admin-radius: 14px;
    --admin-radius-sm: 10px;
}

.admin-list-page .admin-list-header {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.admin-list-page .admin-list-title {
    font-size: 1.5rem;
    font-weight: 700;
    color: var(--admin-text);
    margin: 0;
}

.admin-list-page .admin-btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 20px;
    background: linear-gradient(135deg, var(--admin-accent), #2fd88a);
    color: #0f172a;
    font-weight: 600;
    border-radius: var(--admin-radius-sm);
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-size: 0.95rem;
    transition: transform 0.2s ease, box-shadow 0.2s ease;
    box-shadow: 0 4px 16px rgba(60, 255, 158, 0.3);
}

.admin-list-page .admin-btn-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(60, 255, 158, 0.4);
}

.admin-list-page .admin-table-wrap {
    overflow-x: auto;
    border-radius: var(--admin-radius-sm);
    box-shadow: var(--admin-shadow);
    border: 1px solid rgba(60, 255, 158, 0.08);
}

.admin-list-page .admin-table {
    width: 100%;
    border-collapse: collapse;
    background: var(--admin-card);
}

.admin-list-page .admin-table th {
    text-align: left;
    padding: 14px 18px;
    font-size: 0.8rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: var(--admin-text-muted);
    background: #f8fafc;
    border-bottom: 2px solid #e2e8f0;
}

.admin-list-page .admin-table td {
    padding: 14px 18px;
    border-bottom: 1px solid #f1f5f9;
    color: var(--admin-text);
    font-size: 0.95rem;
}

.admin-list-page .admin-table tbody tr:hover {
    background: #f8fafc;
}

.admin-list-page .admin-table tbody tr:last-child td {
    border-bottom: none;
}

.admin-list-page .admin-btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 6px 14px;
    border-radius: 8px;
    font-size: 0.8rem;
    font-weight: 600;
    cursor: pointer;
    border: 1px solid transparent;
    transition: transform 0.15s ease, opacity 0.15s ease;
}

.admin-list-page .admin-btn:hover {
    transform: scale(1.03);
    opacity: 0.95;
}

.admin-list-page .admin-btn-success {
    background: var(--admin-accent-dim);
    color: #059669;
    border-color: var(--admin-accent);
}

.admin-list-page .admin-btn-danger {
    background: rgba(239, 68, 68, 0.12);
    color: #dc2626;
    border-color: #dc2626;
}

.admin-list-page .admin-btn-warning {
    background: rgba(245, 158, 11, 0.12);
    color: #d97706;
    border-color: #d97706;
}

.admin-list-page .admin-badge {
    display: inline-block;
    padding: 4px 12px;
    border-radius: 999px;
    font-size: 0.75rem;
    font-weight: 600;
}

.admin-list-page .admin-badge-approved { background: var(--admin-accent-dim); color: #059669; }
.admin-list-page .admin-badge-pending { background: rgba(245, 158, 11, 0.2); color: #b45309; }
.admin-list-page .admin-badge-rejected { background: rgba(239, 68, 68, 0.15); color: #dc2626; }

.admin-list-page .admin-card {
    background: var(--admin-card);
    border-radius: var(--admin-radius);
    padding: 1.5rem 2rem;
    box-shadow: var(--admin-shadow);
    border: 1px solid rgba(60, 255, 158, 0.08);
    max-width: 640px;
}

.admin-list-page .admin-card-title {
    font-size: 1.25rem;
    font-weight: 600;
    color: var(--admin-text);
    margin-bottom: 1.25rem;
}

.admin-list-page .admin-form-input {
    width: 100%;
    padding: 12px 16px;
    border: 1px solid #e2e8f0;
    border-radius: var(--admin-radius-sm);
    font-size: 1rem;
    color: var(--admin-text);
    background: #fff;
    margin-bottom: 1rem;
}

.admin-list-page .admin-form-input:focus {
    outline: none;
    border-color: var(--admin-accent);
    box-shadow: 0 0 0 3px var(--admin-accent-dim);
}

.admin-list-page .admin-list-items {
    list-style: none;
    padding: 0;
    margin: 0;
}

.admin-list-page .admin-list-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 16px;
    margin-bottom: 8px;
    background: #f8fafc;
    border-radius: 8px;
    border: 1px solid #f1f5f9;
}

.admin-list-page .admin-list-item:last-child { margin-bottom: 0; }

.admin-list-page .admin-filters {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 1.5rem;
}

.admin-list-page .admin-filter-link {
    padding: 8px 18px;
    border-radius: 999px;
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    background: #f1f5f9;
    color: var(--admin-text);
    border: 1px solid #e2e8f0;
    transition: all 0.2s ease;
}

.admin-list-page .admin-filter-link:hover {
    background: var(--admin-accent-dim);
    color: #059669;
    border-color: var(--admin-accent);
}

.admin-list-page .admin-filter-link.active {
    background: linear-gradient(135deg, var(--admin-accent), #2fd88a);
    color: #0f172a;
    border-color: transparent;
}

.admin-list-page .admin-alert {
    padding: 14px 18px;
    border-radius: var(--admin-radius-sm);
    margin-bottom: 1.5rem;
    background: var(--admin-accent-dim);
    border: 1px solid var(--admin-accent);
    color: #059669;
    font-weight: 500;
}

.admin-list-page .admin-comment-card {
    background: var(--admin-card);
    border: 1px solid #e2e8f0;
    border-radius: var(--admin-radius-sm);
    padding: 1.25rem 1.5rem;
    margin-bottom: 1rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}

.admin-list-page .admin-comment-card .comment-head {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-bottom: 10px;
}

.admin-list-page .admin-comment-card .comment-author { font-weight: 600; color: var(--admin-accent); }
.admin-list-page .admin-comment-card .comment-meta { font-size: 0.8rem; color: var(--admin-text-muted); }
.admin-list-page .admin-comment-card .comment-content { font-size: 0.95rem; color: var(--admin-text); margin: 8px 0; line-height: 1.5; }
.admin-list-page .admin-comment-card .comment-video { font-size: 0.8rem; color: var(--admin-text-muted); }
.admin-list-page .admin-comment-actions { display: flex; gap: 8px; flex-wrap: wrap; }

.admin-list-page .admin-notif-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1rem 0;
    border-bottom: 1px solid #e2e8f0;
}

.admin-list-page .admin-notif-item:last-of-type { border-bottom: none; }

.admin-list-page .admin-notif-icon {
    width: 44px;
    height: 44px;
    border-radius: var(--admin-radius-sm);
    background: var(--admin-accent-dim);
    color: var(--admin-accent);
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.admin-list-page .admin-notif-body strong { color: var(--admin-text); }
.admin-list-page .admin-notif-body .admin-notif-email { font-size: 0.85rem; color: var(--admin-text-muted); }
.admin-list-page .admin-notif-body .admin-notif-content { font-size: 0.9rem; margin: 6px 0; color: var(--admin-text); }
.admin-list-page .admin-notif-body .admin-notif-time { font-size: 0.8rem; color: var(--admin-text-muted); }

.admin-list-page .admin-empty {
    color: var(--admin-text-muted);
    font-size: 1rem;
    padding: 2rem;
    text-align: center;
    background: var(--admin-card);
    border-radius: var(--admin-radius-sm);
    border: 1px dashed #e2e8f0;
}

.admin-list-page .admin-divider {
    border: none;
    border-top: 1px solid #e2e8f0;
    margin: 1.5rem 0;
}

.admin-list-page .admin-back-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--admin-accent);
    font-weight: 600;
    text-decoration: none;
    margin-bottom: 1rem;
    font-size: 0.9rem;
}

.admin-list-page .admin-back-link:hover { text-decoration: underline; }
</style>
