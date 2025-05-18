import React from "react";

interface User {
  id: number;
  name: string;
}

// Fetch users on the server side
async function getUsers(): Promise<User[]> {
  const res = await fetch("http://localhost:8000/api/users", {
    cache: "no-store",
  });
  if (!res.ok) throw new Error("Failed to fetch users");
  return res.json();
}

export default async function UsersPage() {
  let users: User[] = [];
  let error: string | null = null;
  try {
    users = await getUsers();
  } catch (err) {
    // TypeScript expects err to be unknown, so we check if it's an Error
    if (err instanceof Error) {
      error = err.message;
    } else {
      error = "Unknown error";
    }
  }

  return (
    <div className="p-8">
      <h1 className="text-2xl font-bold mb-4">User List</h1>
      {error && <p className="text-red-500">{error}</p>}
      {!error && (
        <ul className="list-disc pl-6">
          {users.map((user) => (
            <li key={user.id} className="mb-2">
              <span className="font-semibold">ID:</span> {user.id}{" "}
              <span className="font-semibold">Name:</span> {user.name}
            </li>
          ))}
        </ul>
      )}
    </div>
  );
}
