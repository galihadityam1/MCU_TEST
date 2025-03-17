import axios from "axios";
import Cookies from "universal-cookie";

interface Task {
    employee_id: number | number;
    task_name: string;
    due_date: string;
}

export async function fetchEmployee() {
    return await axios.get("http://127.0.0.1:8000/api/employees")
};

export const storeTask = async (task: Task, refreshData: () => void) => {
    try {
        const cookies = new Cookies()
        const xsrfToken = cookies.get("XSRF-TOKEN");
        await axios.post(
            "http://127.0.0.1:8000/api/task",
            { ...task },
            {
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": xsrfToken,
                },
                withCredentials: true,
            }
        );

        refreshData();
    } catch (error) {
        console.error("Error submitting task:", error);
    }
};