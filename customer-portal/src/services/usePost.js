import { useState, useEffect } from "react";

export function usePost(baseUrl, data) {
  const [loading, setLoading] = useState(true);
  const [result, setResult] = useState(null);
  const [error, setError] = useState(null);

  useEffect(() => {
    const abortController = new AbortController();
    setLoading(true);
    const requestOptions = {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(data),
      signal: abortController.signal,
    };
    fetch(baseUrl, requestOptions)
      .then((response) => response.json())
      .then((result) => {
        setResult(result);
      })
      .catch((error) => setError(error))
      .finally(() => setLoading(false));

    return () => abortController.abort(); //se ejecuta cuando el componente se ha desmontado (cuando no esta mas en pantalla)
  }, []);

  return { result, loading, error };
}
