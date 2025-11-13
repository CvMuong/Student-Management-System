<?php 
class StudentModel {
    public static function getAll() {
        return $_SESSION['students'] ?? [];
    }

    public static function getById($id) {
        foreach(self::getAll() as $student) {
            if ($student['id'] == $id) return $student;
        }

        return null;
    }

    public static function add($data) {
        $students = self::getAll();
        $data['id'] = count($students) > 0 ? end($students)['id'] + 1 : 1;
        $students[] = $data;
        $_SESSION['students'] = $students;
    }

    public static function update($id, $data) {
        foreach ($_SESSION['students'] as &$s) {
            if ($s['id'] == $id) {
                $s = array_merge($s, $data);
                break;
            }
        } 
    }

    public static function delete($id) {
        $_SESSION['students'] = array_filter(self::getAll(), fn($s) => $s['id'] != $id);
    }

    public static function search($keyword) {
        return array_filter(self::getAll(), function ($s) use ($keyword) {
            return stripos($s['name'], $keyword) !== false || stripos($s['email'], $keyword) !== false;
        });
    }
}
?>