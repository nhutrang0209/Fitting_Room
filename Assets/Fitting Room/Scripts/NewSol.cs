using System;

namespace Fitting_Room
{
    public class NewSol
    {
        private void Solve(int[] inputArr)
        {
            int len = inputArr.Length;
            int startIndex = 0;
            int startValue = inputArr[0];
            int res = 0;

            int previousValue = -1;
            int previousCount = 0;
            int cnt = 0;
            int tmp = 1;

            for (int i = 1; i < inputArr.Length; ++i)
            {
                if (inputArr[i] == inputArr[i - 1])
                {
                    tmp++;
                }
                else
                {
                    if (previousValue != -1)
                    {
                        tmp += previousCount;
                    }

                    previousValue = inputArr[i - 1];
                    
                    res = Math.Max(res, tmp);
                    tmp = 0;
                }
            }
        }
    }
}