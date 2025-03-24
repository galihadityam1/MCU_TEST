'use client'
import { useEffect, useState } from "react";
import { Employee, Task } from "@/Types";
import AddTask from "@/components/AddTask";
import { deleteTask, fetchEmployee } from "@/actions/actions";
import Swal from "sweetalert2";

export default function Home() {
  const [employees, setEmployees] = useState([]);

  async function fetchData() {
    await fetchEmployee()
      .then(response => setEmployees(response.data))
      .catch(error => console.error(error));
  }

  async function deleteData(id: number) {
    const res = await deleteTask(id)

    if (res?.status !== 200) {
      return Swal.fire({
        title: 'Fail to delete task',
        showConfirmButton: false,
        timer: 1500,
        icon: 'warning'
      })
    }

    return Swal.fire({
      title: "Success!",
      text: "Task has deleted!",
      icon: "success"
    })
  }

  useEffect(() => {
    fetchData()
  }, [deleteData]);

  return (
    <div className="container mt-5">
      <h2>Daftar Karyawan dan Tugas</h2>
      <table className="table table-bordered">
        <thead>
          <tr>
            <th>Nama Karyawan</th>
            <th>Task</th>
            <th>Due Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          {employees && employees.map((emp: Employee, i) => (
            emp.tasks.length > 0 ? (
              emp.tasks.map((task: Task) => (
                <tr key={task.id}>
                  <td>{emp.name}</td>
                  <td>{task.task_name}</td>
                  <td>{new Date(task.due_date).toLocaleDateString()}</td>
                  <td>
                    <button onClick={() => deleteData(task.id)}>
                      Delete
                    </button>
                  </td>
                </tr>
              ))
            ) : (
              <tr key={`no-task-${emp.id}`}>
                <td>{emp.name}</td>
                <td colSpan={2} style={{ textAlign: "center" }}>No tasks assigned</td>
                <td></td>
              </tr>
            )
          ))}
        </tbody>
      </table>

      <AddTask refreshData={fetchData} />
    </div>
  );
}
