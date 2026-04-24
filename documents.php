<!doctype html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quản lý tài liệu</title>
    <style>
      :root {
        --bg: #f3f8ff;
        --surface: #ffffff;
        --surface-soft: #f7fbff;
        --primary: #0f5fe0;
        --primary-strong: #0a47ad;
        --primary-soft: #dbeafe;
        --text: #0f172a;
        --muted: #64748b;
        --border: #dbe7f5;
        --success-bg: #dcfce7;
        --success-text: #166534;
        --shadow: 0 12px 30px rgba(15, 95, 224, 0.12);
      }

      * {
        box-sizing: border-box;
      }

      body {
        margin: 0;
        font-family:
          Inter,
          ui-sans-serif,
          system-ui,
          -apple-system,
          BlinkMacSystemFont,
          "Segoe UI",
          sans-serif;
        background:
          radial-gradient(
            circle at top left,
            rgba(59, 130, 246, 0.12),
            transparent 24%
          ),
          linear-gradient(180deg, #eff6ff 0%, #f8fbff 40%, #f3f8ff 100%);
        color: var(--text);
      }

      .layout {
        min-height: 100vh;
        display: grid;
        grid-template-columns: 280px 1fr;
      }

      .sidebar {
        background: linear-gradient(
          180deg,
          #0b3b91 0%,
          #0f5fe0 55%,
          #1d75f2 100%
        );
        color: #fff;
        padding: 28px 20px;
        display: flex;
        flex-direction: column;
        gap: 28px;
        box-shadow: 8px 0 24px rgba(15, 95, 224, 0.18);
      }

      .brand {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 10px 8px;
      }

      .brand-icon {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        background: rgba(255, 255, 255, 0.18);
        display: grid;
        place-items: center;
        font-size: 20px;
        font-weight: 700;
        backdrop-filter: blur(8px);
      }

      .brand-title {
        font-size: 20px;
        font-weight: 700;
      }

      .brand-subtitle {
        font-size: 13px;
        opacity: 0.8;
        margin-top: 2px;
      }

      .menu-label {
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.08em;
        opacity: 0.75;
        padding: 0 10px;
      }

      .menu {
        display: flex;
        flex-direction: column;
        gap: 10px;
      }

      .menu a {
        color: rgba(255, 255, 255, 0.92);
        text-decoration: none;
        padding: 14px 16px;
        border-radius: 16px;
        font-weight: 600;
        transition: 0.2s ease;
        background: transparent;
      }

      .menu a:hover,
      .menu a.active {
        background: rgba(255, 255, 255, 0.16);
        box-shadow: inset 0 0 0 1px rgba(255, 255, 255, 0.14);
        transform: translateX(2px);
      }

      .sidebar-card {
        margin-top: auto;
        background: rgba(255, 255, 255, 0.14);
        border: 1px solid rgba(255, 255, 255, 0.16);
        border-radius: 20px;
        padding: 18px;
        backdrop-filter: blur(8px);
      }

      .sidebar-card-title {
        font-size: 14px;
        font-weight: 700;
        margin-bottom: 8px;
      }

      .sidebar-card-text {
        font-size: 13px;
        line-height: 1.6;
        opacity: 0.9;
      }

      .main {
        padding: 34px;
      }

      .topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
      }

      .page-title {
        font-size: 30px;
        font-weight: 800;
        margin: 0 0 6px;
      }

      .page-desc {
        margin: 0;
        color: var(--muted);
        font-size: 15px;
      }

      .primary-btn {
        border: none;
        background: linear-gradient(135deg, var(--primary) 0%, #3b82f6 100%);
        color: #fff;
        padding: 14px 18px;
        border-radius: 14px;
        font-size: 14px;
        font-weight: 700;
        cursor: pointer;
        box-shadow: 0 14px 30px rgba(15, 95, 224, 0.22);
      }

      .stats {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 18px;
        margin-bottom: 24px;
      }

      .stat-card,
      .content-card {
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid rgba(219, 231, 245, 0.95);
        border-radius: 22px;
        box-shadow: var(--shadow);
      }

      .stat-card {
        padding: 22px;
      }

      .stat-label {
        color: var(--muted);
        font-size: 14px;
        margin-bottom: 10px;
      }

      .stat-value {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 8px;
      }

      .stat-note {
        font-size: 13px;
        color: #2563eb;
        font-weight: 600;
      }

      .content-card {
        padding: 24px;
      }

      .toolbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 20px;
      }

      .search-box {
        flex: 1 1 320px;
        position: relative;
      }

      .search-box input {
        width: 100%;
        height: 52px;
        border: 1px solid var(--border);
        background: var(--surface-soft);
        border-radius: 16px;
        padding: 0 18px 0 48px;
        outline: none;
        font-size: 14px;
        color: var(--text);
      }

      .search-box input:focus {
        border-color: #93c5fd;
        box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.14);
        background: #fff;
      }

      .search-icon {
        position: absolute;
        left: 16px;
        top: 50%;
        transform: translateY(-50%);
        color: #3b82f6;
        font-size: 16px;
      }

      .toolbar-actions {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
      }

      .ghost-btn {
        height: 48px;
        padding: 0 16px;
        border-radius: 14px;
        border: 1px solid var(--border);
        background: #fff;
        color: var(--text);
        font-weight: 600;
        cursor: pointer;
      }

      .table-wrap {
        overflow-x: auto;
        border: 1px solid var(--border);
        border-radius: 18px;
        background: #fff;
      }

      table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
      }

      th,
      td {
        padding: 18px 20px;
        text-align: left;
        border-bottom: 1px solid #edf4fb;
        font-size: 14px;
      }

      th {
        background: #f8fbff;
        color: #334155;
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: 0.04em;
      }

      .status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 999px;
        background: var(--success-bg);
        color: var(--success-text);
        font-weight: 700;
        font-size: 12px;
      }

      .status::before {
        content: "";
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: currentColor;
      }

      .empty-state {
        padding: 54px 24px;
        text-align: center;
        background: linear-gradient(180deg, #ffffff 0%, #f8fbff 100%);
      }

      .empty-icon {
        width: 72px;
        height: 72px;
        margin: 0 auto 18px;
        border-radius: 22px;
        display: grid;
        place-items: center;
        background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%);
        color: var(--primary);
        font-size: 30px;
        font-weight: 800;
      }

      .empty-title {
        margin: 0 0 8px;
        font-size: 22px;
        font-weight: 800;
      }

      .empty-text {
        margin: 0 auto 20px;
        max-width: 520px;
        color: var(--muted);
        line-height: 1.7;
      }

      .empty-actions {
        display: flex;
        justify-content: center;
        gap: 12px;
        flex-wrap: wrap;
      }

      @media (max-width: 1100px) {
        .layout {
          grid-template-columns: 1fr;
        }

        .sidebar {
          padding-bottom: 24px;
        }

        .stats {
          grid-template-columns: 1fr;
        }
      }

      @media (max-width: 768px) {
        .main {
          padding: 20px;
        }

        .topbar {
          flex-direction: column;
          align-items: flex-start;
        }

        .page-title {
          font-size: 24px;
        }

        .content-card,
        .stat-card {
          border-radius: 18px;
        }
      }
    </style>
  </head>

  <body>
    <div class="layout">
      <aside class="sidebar">
        <div class="brand">
          <div class="brand-icon">A</div>
          <div>
            <div class="brand-title">Admin Panel</div>
            <div class="brand-subtitle">Hệ thống quản lý tài liệu</div>
          </div>
        </div>

        <div>
          <div class="menu-label">Điều hướng</div>
          <nav class="menu">
            <a href="#">Tổng quan</a>
            <a href="#">Quản lý người dùng</a>
            <a href="#" class="active">Quản lý tài liệu</a>
            <a href="#">Duyệt tự động</a>
          </nav>
        </div>

        <div class="sidebar-card">
          <div class="sidebar-card-title">Không gian làm việc</div>
          <div class="sidebar-card-text">
            Theo dõi tài liệu, quản lý danh mục và tối ưu quy trình duyệt trên
            một giao diện gọn gàng, chuyên nghiệp.
          </div>
        </div>
      </aside>

      <main class="main">
        <div class="topbar">
          <div>
            <h1 class="page-title">Quản lý tài liệu</h1>
            <p class="page-desc">
              Theo dõi, tìm kiếm và quản lý toàn bộ tài liệu trong hệ thống.
            </p>
          </div>
          <button class="primary-btn">+ Thêm tài liệu</button>
        </div>

        <section class="stats">
          <div class="stat-card">
            <div class="stat-label">Tổng tài liệu</div>
            <div class="stat-value">0</div>
            <div class="stat-note">Sẵn sàng để cập nhật</div>
          </div>

          <div class="stat-card">
            <div class="stat-label">Danh mục</div>
            <div class="stat-value">0</div>
            <div class="stat-note">Phân loại khoa học hơn</div>
          </div>

          <div class="stat-card">
            <div class="stat-label">Trạng thái hệ thống</div>
            <div class="stat-value" style="font-size: 22px">Hoạt động tốt</div>
            <div class="stat-note">Sẵn sàng tiếp nhận dữ liệu</div>
          </div>
        </section>

        <section class="content-card">
          <div class="toolbar">
            <div class="search-box">
              <span class="search-icon">⌕</span>
              <input
                type="text"
                placeholder="Tìm tài liệu theo tên, danh mục hoặc người đăng..."
              />
            </div>

            <div class="toolbar-actions">
              <button class="ghost-btn">Bộ lọc</button>
              <button class="ghost-btn">Sắp xếp</button>
              <button class="primary-btn">Xuất dữ liệu</button>
            </div>
          </div>

          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Tài liệu</th>
                  <th>Danh mục</th>
                  <th>Người đăng</th>
                  <th>Trạng thái</th>
                  <th>Hành động</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td colspan="5" class="empty-state">
                    <div class="empty-icon">D</div>
                    <h2 class="empty-title">Chưa có tài liệu nào</h2>
                    <p class="empty-text">
                      Hiện chưa có dữ liệu tài liệu trong hệ thống. Bạn có thể
                      thêm tài liệu mới để bắt đầu quản lý, theo dõi và phân
                      loại nội dung hiệu quả hơn.
                    </p>
                    <div class="empty-actions">
                      <button class="primary-btn">Tải lên tài liệu</button>
                      <button class="ghost-btn">Xem hướng dẫn</button>
                    </div>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </body>
</html>
