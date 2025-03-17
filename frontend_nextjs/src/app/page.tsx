'use client'
import { useEffect, useState } from "react";
import { Employee, Task } from "@/Types";
import AddTask from "@/components/AddTask";
import { fetchEmployee } from "@/actions/actions";

export default function Home() {
  const [employees, setEmployees] = useState([]);

  async function fetchData() {
    await fetchEmployee()
      .then(response => setEmployees(response.data))
      .catch(error => console.error(error));
  }

  useEffect(() => {
    fetchData()
  }, []);

  return (
    <div className="container mt-5">
      <h2>Daftar Karyawan dan Tugas</h2>
      <table className="table table-bordered">
        <thead>
          <tr>
            <th>Nama Karyawan</th>
            <th>Task</th>
            <th>Due Date</th>
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
                </tr>
              ))
            ) : (
              <tr key={`no-task-${emp.id}`}>
                <td>{emp.name}</td>
                <td colSpan={2} style={{ textAlign: "center" }}>No tasks assigned</td>
              </tr>
            )
          ))}
        </tbody>
      </table>

      <AddTask refreshData={fetchData} />
    </div>
  );
}
