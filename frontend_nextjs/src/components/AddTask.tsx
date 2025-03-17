'use client'
import { ChangeEvent, FormEvent, useEffect, useState } from "react";
import { fetchEmployee, storeTask } from "@/actions/actions";
import { Employee } from "@/Types";

interface AddTaskProps {
    refreshData: () => void;
}

export default function AddTask({ refreshData }: AddTaskProps) {
    const [task, setTask] = useState({
        employee_id: "",
        task_name: "",
        due_date: ""
    });
    const [employees, setEmployees] = useState([]);

    async function fetchData() {
        await fetchEmployee()
            .then(response => setEmployees(response.data))
            .catch(error => console.error(error));
    }

    const handleChange = (e: ChangeEvent<HTMLInputElement | HTMLSelectElement>) => {
        const { name, value } = e.target;

        setTask((prevTask) => ({
            ...prevTask,
            [name]: name === "employee_id" ? Number(value) : value
        }));
    };

    const handleSubmit = async (e: FormEvent<HTMLFormElement>) => {
        e.preventDefault();
        await storeTask({ ...task, employee_id: Number(task.employee_id) }, refreshData)
            .catch(error => console.error(error))
    };

    useEffect(() => {
        fetchData()
    }, []);
    return (
        <div>
            <h2 className="text-xl font-semibold text-gray-800 mb-4">Tambah Tugas</h2>
            <form onSubmit={handleSubmit} className="mt-3">
                <select name="employee_id" onChange={handleChange} required className="form-control">
                    <option value="">Pilih Karyawan</option>
                    {employees.map((employee: Employee) => (
                        <option key={employee.id} value={employee.id}>
                            {employee.name}
                        </option>
                    ))}
                </select>
                <input type="text" name="task_name" onChange={handleChange} placeholder="Nama Tugas" className="form-control mt-2" required />
                <input type="date" name="due_date" onChange={handleChange} className="form-control mt-2" required />
                <button type="submit" className="btn btn-primary mt-3">Tambah Tugas</button>
            </form>
        </div>
    );
}
