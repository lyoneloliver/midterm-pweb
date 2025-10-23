<aside class="w-64 bg-blue-700 text-white flex flex-col">
    <div class="p-4 text-2xl font-bold border-b border-blue-500">
        FRS System
    </div>

    <nav class="flex-1 p-4 space-y-2">
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">Dashboard</a>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link">Users</a>
            <a href="{{ route('admin.departments.index') }}" class="sidebar-link">Departments</a>
            <a href="{{ route('admin.courses.index') }}" class="sidebar-link">Courses</a>
            <a href="{{ route('admin.settings.index') }}" class="sidebar-link">Settings</a>

        @elseif(Auth::user()->role === 'lecturer')
            <a href="{{ route('lecturer.dashboard') }}" class="sidebar-link">Dashboard</a>
            <a href="{{ route('lecturer.class-sections.index') }}" class="sidebar-link">Classes</a>
            <a href="{{ route('lecturer.attendance.index') }}" class="sidebar-link">Attendance</a>
            <a href="{{ route('lecturer.grades.index') }}" class="sidebar-link">Grades</a>

        @elseif(Auth::user()->role === 'student')
            <a href="{{ route('student.dashboard') }}" class="sidebar-link">Dashboard</a>
            <a href="{{ route('student.enrollments.index') }}" class="sidebar-link">Enrollments</a>
            <a href="{{ route('student.schedule.index') }}" class="sidebar-link">Schedule</a>
            <a href="{{ route('student.semester-enrollments.index') }}" class="sidebar-link">Grades</a>
        @endif
    </nav>

    <footer class="p-4 text-sm text-center border-t border-blue-500">
        &copy; {{ date('Y') }} FRS System
    </footer>
</aside>
